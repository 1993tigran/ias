<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 16/09/15
 * Time: 16:00
 */

namespace App\Services;


use App\ChatMessage;
use App\ChatThread;
use App\Classes;
use App\Device;
use App\IssueReport;
use App\Jobs\SendMessage;
use App\News;
use App\ReportQuestion;
use App\Settings;
use App\Tips;
use App\User;
use App\UserMessages;
use App\UserType;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Bus;

class ApiService implements ApiServiceContract
{

    public function registerUser($request)
    {
        $student = new User();
        $student->name = 'Student';
        $student->email = $request->get('username');
        $student->password = \Hash::make($request->get('password'));
        $student->request_password = $request->get('requestPassword');
        $student->type = UserType::$student;
        $student->class_id = $request->get('classId');

        try {
            $student->save();
        } catch (QueryException $e) {
            return ['success' => false, 'message' => 'A user already exists with that username!'];
        }

        if (\Auth::attempt(array('email' => $student->email, 'password' => $request->get('password')), true)) {
            $response = $this->createDevice($request);
            if ($response)
                return $response;
            $response = ['success' => true, 'data' => \Auth::user()];
        } else {
            $response = ['success' => false, 'message' => 'An error occured'];
        }
        return $response;
    }

    public function login($request)
    {
        $credentials = ['email' => $request->get('username'), 'password' => $request->get('password')];
        if (\Auth::attempt($credentials, true)) {
//            if(\Auth::user()->type == 'teacher')
            if (false) {
                \Auth::logout();
                return ['success' => false, 'message' => 'Je gebruikersnaam en/of wachtwoord zijn niet goed.'];
            }
            $response = $this->createDevice($request);
            if ($response)
                return $response;
            return ['success' => true, 'data' => \Auth::user()];
        } else {
            return ['success' => false, 'message' => 'Je gebruikersnaam en/of wachtwoord zijn niet goed.'];
        }
    }

    public function checkLogin()
    {
        if (\Auth::user()) {
//            $user = User::with('class')->find(\Auth::user()->id);
            $user = User::find(\Auth::user()->id);
            return ['success' => true, 'data' => \Auth::user()];
        } else {
            return ['success' => false];
        }
    }


    public function logout($request)
    {
        if (\Auth::user()) {
            $udid = $request->header('udid');
            if ($udid) {
                $device = Device::where(['udid' => $udid])->first();
                if ($device) {
                    $device->delete();
                }
            }
            \Auth::logout();
            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }

    public function updateUser($request)
    {
        $user = User::find(\Auth::user()->id);
        if ($user) {
            $classId = $request->get('classId');
            $newPassword = $request->get('newPassword');
            if ($newPassword) {
                $oldPassword = $request->get('oldPassword');
                $credentials = ['email' => $user->email, 'password' => $oldPassword];
                if (\Auth::attempt($credentials, true)) {
                    $user->password = \Hash::make($newPassword);
                } else {
                    return ['success' => false, 'message' => 'Je gebruikersnaam en/of wachtwoord zijn niet goed.'];
                }
            }
            $requestPassword = $request->get('requestPassword');
            if (!is_null($requestPassword)) {
                if ($requestPassword) {
                    $user->request_password = true;
                } else {
                    $user->request_password = false;
                }
            }
            $classId = $request->get('classId');
            if ($classId){
                $user->class_id = $classId;
            }
            $user->update();
            return ['success' => true, 'data' => $user];
        } else {
            return ['success' => false, 'message' => 'User not found'];
        }
    }

    public function getNews()
    {
        $news = News::orderBy('created_at', 'desc')->get()->toArray();
        if ($news) {
            return ['success' => true, 'data' => $news];
        } else {
            return ['success' => false, 'message' => 'No news found at this moment! Please try again later'];
        }
    }

    public function getClasses()
    {
        return ['success' => true, 'data' => array(
            Classes::orderBy('created_at', 'desc')->get()->toArray()
        )];
    }

    public function saveIssue($request)
    {

        $issue = new IssueReport();

        $issue->type = $request->get('type');
        $issue->user_id = \Auth::user()->id;

        $issue->save();

        $questions = $request->get('data');
        $mood = 'none';
        foreach ($questions as $question) {
            if ($question['question'] == 'Hoe voel je je nu?') {
                if ((!empty($question['answer'][0]) && $question['answer'][0] == 'Slecht') || (!empty($question['answer'][0]) && $question['answer'][0] == 'Verdrietig')){
                    $mood = 'sad';
                }
                if ((!empty($question['answer'][0]) && $question['answer'][0] == 'Kan beter') || (!empty($question['answer'][0]) && $question['answer'][0] == 'OKÉ') || (!empty($question['answer'][0]) && $question['answer'][0] == 'Prima')){
                    $mood = 'neutral';
                }
                if ((!empty($question['answer'][0]) && $question['answer'][0] == 'Geweldig') || (!empty($question['answer'][0]) && $question['answer'][0] == 'Fantastisch') ){
                    $mood = 'happy';
                }
            }

            $issueQuestion = new ReportQuestion();
            $issueQuestion->question = $question['question'];
            $issueQuestion->answer = implode(',', $question['answer']);
            $issueQuestion->issue_report_id = $issue->id;
            $issueQuestion->save();
        }

        $data = ['mood' => $mood, 'issueType' => $issue->type, 'id' => $issue->id];
        $reciever = Settings::first();
        switch ($mood) {
            case 'sad':
                $this->sendMailScript($data, $reciever->report_red_issue_email);
            case 'neutral':
                $this->sendMailScript($data, $reciever->report_orange_issue_email);
            case 'happy':
                $this->sendMailScript($data, $reciever->report_green_issue_email);
                break;
        }
        return ['success' => true, 'message' => 'Your report was saved!'];
    }

    public function sendMessage($request)
    {

        $studentId = $request->get('studentId');
        $classId = $request->get('class_id');

        if ($studentId) {

            $message = new ChatMessage();
            $message->message = $request->get('message');
            $message->sender_type = \Auth::user()->type;
            $message->save();

            $user_messages = new UserMessages();
            $user_messages->sender_id = \Auth::user()->id;
            $user_messages->message_id = $message->id;
            $user_messages->user_id = $studentId;
            $user_messages->save();

            $devices = Device::where(['user_id' => $studentId])->get();

            foreach ($devices as $device) {
                if (!empty($device->push_token) && !empty($device->os)) {

                    Bus::dispatch(new SendMessage(['os' => $device->os, 'udid' => $device->push_token, 'environment' => $device->environment, 'message' => array('message' => $message->message, 'user_id' => $studentId, 'user_name' => \Auth::user()->email)]));
                }
            }

            $udid = $request->header('udid');
            if ($udid) {
                $adminDevices = Device::where('user_id', '=', \Auth::user()->id)->where('udid', '<>', $udid)->get();
                if ($adminDevices) {
                    foreach ($adminDevices as $device) {
                        if (!empty($device->push_token) && !empty($device->os)) {
                           Bus::dispatch(new SendMessage(['os' => $device->os, 'udid' => $device->push_token, 'environment' => $device->environment, 'message' => array('message' => $message->message, 'user_id' => $studentId, 'user_name' => \Auth::user()->email)]));
                        }
                    }
                }
            }
        } else if ($classId) {

            $teachers = User::where(['type' => 'teacher', 'class_id' => $classId])->get();

            $message = new ChatMessage();
            $message->message = $request->get('message');
            $message->sender_type = \Auth::user()->type;
            $message->save();
            foreach ($teachers as $teacher) {

                $teachers_id = $teacher->id;

                $user_messages = new UserMessages();
                $user_messages->sender_id = \Auth::user()->id;
                $user_messages->message_id = $message->id;
                $user_messages->user_id = $teachers_id;
                $user_messages->save();

                $devices = Device::where(['user_id' => $teachers_id])->get();

                if (!empty(count($devices) > 0)){

                    foreach ($devices as $device) {
                        if (!empty($device->push_token) && !empty($device->os)) {
                            Bus::dispatch(new SendMessage(['os' => $device->os, 'udid' => $device->push_token, 'environment' => $device->environment, 'message' => array('message' => $message->message, 'user_id' => $teachers_id, 'user_name' => \Auth::user()->email)]));
                        }
                    }

//                    $udid = $request->header('udid');
//                    if ($udid) {
//                        $adminDevices = Device::where('user_id', '=', \Auth::user()->id)->where('udid', '<>', $udid)->get();
//                        if ($adminDevices) {
//                            foreach ($adminDevices as $device) {
//                                if (!empty($device->push_token) && !empty($device->os)) {
//                                    Bus::dispatch(new SendMessage(['os' => $device->os, 'udid' => $device->push_token, 'environment' => $device->environment, 'message' => array('message' => $message->message, 'user_id' => $teachers_id, 'user_name' => \Auth::user()->email)]));
//                                }
//                            }
//                        }
//                    }
                }

            }
        } else {
            $thread = ChatThread::where(['user_id' => \Auth::user()->id])->first();
            if (!$thread) {
                $thread = new ChatThread();
                $thread->user_id = \Auth::user()->id;
                $thread->save();
            }

            $message = new ChatMessage();
            $message->thread_id = $thread->id;
            $message->message = $request->get('message');
            $message->sender_type = \Auth::user()->type;
            $message->save();

            $adminUser = User::where(['type' => 'admin'])->first();
            $devices = Device::where(['user_id' => $adminUser->id])->get();
            foreach ($devices as $device) {
                Bus::dispatch(
                    new SendMessage(
                        [
                            'os' => $device->os,
                            'udid' => $device->push_token,
                            'environment' => $device->environment,
                            'message' => array(
                                'message' => $message->message,
                                'user_id' => \Auth::user()->id,
                                'user_name' => \Auth::user()->email)]
                    ));
            }
        }

        return ['success' => true];
    }

    public function getMessages($request)
    {
        $userType = \Auth::user()->type;
        if ($userType == 'student') {
            $userMessages = UserMessages::orWhere(['sender_id' => \Auth::user()->id])
                ->orWhere(['user_id' => \Auth::user()->id])
                ->with('message')
                ->with('sender')
                ->with('recaiver')
                ->groupBy('message_id')
                ->get();

            if ($userMessages) {
                return ['success' => true, 'data' => $userMessages];
            } else {
                return ['success' => false, 'message' => 'No thread was found for this student!'];
            }
        } else {

            $sender_Id = $request->get('senderId');

            $userMessages = UserMessages::orWhere(['sender_id' => $sender_Id])
                ->orWhere(['user_id' => $sender_Id])
                ->with('message')
                ->with('sender')
                ->with('recaiver')
                ->groupBy('message_id')
                ->get();


            if ($userMessages) {
                return ['success' => true, 'data' => $userMessages];
            } else {
                return ['success' => false, 'message' => 'No thread was found!'];
            }
        }
    }

    public function getStudentList()
    {
        $students1 = $userMessages = UserMessages::orWhere(['sender_id' => \Auth::user()->id])
            ->with('sender')
            ->with('recaiver')
            ->groupBy('user_id')
            ->get();

        $user_ids = [];

        foreach ($students1 as $student) {
            if (!in_array($student->user_id, $user_ids)) {
                array_push($user_ids, $student->user_id);
            }
        }
        $students2 = $userMessages = UserMessages::orWhere(['user_id' => \Auth::user()->id])
            ->whereNotIn('sender_id', $user_ids)
            ->with('sender')
            ->with('recaiver')
            ->groupBy('sender_id')
            ->get();

        $result = $students1->merge($students2);

        if ($result) {
            return ['success' => true, 'data' => $result];
        } else {
            return ['success' => false, 'message' => 'No thread was found!'];
        }
    }

    public function getTips()
    {
        $tips = Tips::orderBy('created_at', 'desc')->get()->toArray();
//        if ($tips) {
            return ['success' => true, 'data' => $tips];
//        } else {
//            return ['success' => false, 'message' => 'No tips found at this moment! Please try again later'];
//        }
    }

    public function sendMailScript($data, $recipient)
    {
        Mail::send('emails.welcome', $data, function ($message) use ($recipient) {
            $message->from('admin@ias.nl', 'IAS Admin');
            $message->subject('Er is een probleem gemeld!');

            $message->to($recipient);
        });
    }

    public function readMessage($messageId)
    {
        $message = ChatMessage::find($messageId);
        if ($message) {
            $message->read = true;
            $message->update();
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'The message was not found'];
        }
    }

    public function readThread($request)
    {
        $userId = $request->get('userId');
        $thread = ChatThread::where(['user_id' => $userId])->first();
        if ($thread) {
            $thread->read = true;
            $thread->update();
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'The thread was not found'];
        }
    }

    public function createDevice($request)
    {
        $os = $request->header('os');
        $udid = $request->header('udid');
        $pushToken = $request->header('pushToken');
        $environment = $request->header('environment');
//        if($pushToken)
//        {
        if ($udid) {
            $device = Device::where(['udid' => $udid])->first();
            if ($device) {
                $device->os = $os;
                if ($pushToken)
                    $device->push_token = $pushToken;
                $device->environment = $environment;
                $device->user_id = \Auth::user()->id;
                $device->save();
            } else {
                $device = new Device();
                $device->os = $os;
                $device->udid = $udid;
                if ($pushToken)
                    $device->push_token = $pushToken;
                $device->environment = $environment;
                $device->user_id = \Auth::user()->id;
                $device->save();
            }
            return false;
        } //        }
        else {
            $response = ['success' => false, 'message' => 'No UDID inserted.'];
            return $response;
        }
    }
}