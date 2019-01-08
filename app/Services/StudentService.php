<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 21/09/15
 * Time: 16:15
 */

namespace App\Services;

use App\ChatMessage;
use App\ChatThread;
use App\FlashAlert;
use App\IssueReport;
use App\ReportQuestion;
use App\User;
use App\UserType;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;

class StudentService implements StudentServiceContract
{
    public function getStudentsList($page, $rows, $filter)
    {
        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
//        $students = User::where(['type' => UserType::$student])->where('email','ILIKE','%' . $filter. '%')->paginate($rows)->toArray();
        $students = User::where(['type' => UserType::$student])->paginate($rows)->toArray();
        return $students;
    }

    public function deleteStudent($studentId)
    {
        $student = User::find($studentId);
        try{
            if($student)
            {
                if($student->type == UserType::$student)
                {
                    $name = $student->email;
                    $issue = IssueReport::where(['user_id' => $student->id])->first();
                    if($issue)
                    {
                        $issueQuestions = ReportQuestion::where(['issue_report_id' => $issue->id])->get();
                        if($issueQuestions)
                        {
                            foreach($issueQuestions as $issueQuestion)
                            {
                                $issueQuestion->delete();
                            }
                        }
                        $issue->delete();
                    }
                    $thread = ChatThread::where(['user_id' => $student->id])->first();
                    if($thread)
                    {
                        $messages = ChatMessage::where(['thread_id' => $thread->id])->get();
                        foreach ($messages as $message)
                        {
                            $message->delete();
                        }
                        $thread->delete();
                    }
                    $student->delete();
                }
                else
                {
                    FlashAlert::errorMessage('Can\'t find student!');
                    return false;
                }
            }
            else
            {
                FlashAlert::errorMessage('Can\'t find student!');
                return false;
            }
        }
        catch(QueryException $e)
        {
            FlashAlert::errorMessage('Can\'t find student!');
            return false;
        }
        FlashAlert::successfulMessage('Student with username '.$name.' was successfully deleted!');
        return true;
    }

    public function sendMessage($request)
    {
        $apiObject = new ApiService();
        $apiObject->sendMessage($request);
    }

    public function getStudentByName($filter)
    {
        $students = User::where(['type' => UserType::$student])->where('email','ILIKE','%' . $filter. '%')->get();
        return $students;
    }
}