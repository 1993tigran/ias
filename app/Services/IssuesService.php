<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 02/10/15
 * Time: 12:47
 */

namespace App\Services;


use App\ChatMessage;
use App\ChatThread;
use App\FlashAlert;
use App\IssueReport;
use App\ReportQuestion;
use Illuminate\Pagination\Paginator;
use PhpParser\Error;

/**
 * Class IssuesService
 * @package App\Services
 */
class IssuesService implements IssuesServiceContract
{

    public function getIssuesList($filter)
    {
        Paginator::currentPageResolver(function() use ($filter) {
            return $filter['page'];
        });
        $issues = IssueReport::orderBy('issue_reports.created_at','desc')
            ->join('users', 'users.id' , '=' , 'issue_reports.user_id')
            ->select([
                'issue_reports.id as id',
                'issue_reports.type as type',
                'issue_reports.created_at as created_at',
                'users.email as email',
            ])
            ->paginate($filter['rows'])
            ->toArray();
        return $issues;
    }

    /**
     * @param $id
     * @return bool
     */
    public function findReport($reportId)
    {
        $issueReport = IssueReport::find($reportId);
        if($issueReport)
        {
            return $issueReport;
        }
        else
        {
            FlashAlert::errorMessage('The reported issue is not found!');
            return false;
        }
    }

    public function getIssueQuestions($filter, $reportId)
    {
        Paginator::currentPageResolver(function() use ($filter) {
            return $filter['page'];
        });
        $issues = ReportQuestion::where(['issue_report_id' => $reportId])
            ->paginate($filter['rows'])
            ->toArray();
        $result = [];
        foreach ($issues['data'] as $issue)
        {
            $x['question'] = $issue['question'];
            $x['answer'] = explode(',',$issue['answer']);
            array_push($result,$x);
        }
        return $result;
    }

    public function findThread($reportId)
    {
        $issueReport = IssueReport::find($reportId);
        $thread = ChatThread::where(['user_id' => $issueReport->user_id])->first();
        if($thread)
        {
            return $thread;
        }
        else
        {
            FlashAlert::errorMessage('Er is geen chatgeschiedenis gevonden voor deze scholier.');
            return false;
        }
    }

    public function getChatHistory($filter, $threadId)
    {
        Paginator::currentPageResolver(function() use ($filter) {
            return $filter['page'];
        });
        $messages = ChatMessage::where(['thread_id' => $threadId])->paginate($filter['rows'])->toArray();
        return $messages;
    }

    public function deleteThread($threadId)
    {
        $thread = ChatThread::find($threadId);
        if($thread)
        {
            $messages = ChatMessage::where(['thread_id' => $threadId])->get();
            foreach($messages as $message)
            {
                try
                {
                    $message->delete();
                }
                catch(Error $e)
                {
                    FlashAlert::errorMessage('There was a problem on deleting the messages');
                    return false;
                }
            }
            try
            {
                $thread->delete();
            }
            catch(Error $e)
            {
                FlashAlert::errorMessage('There was a problem on deleting the thread');
                return false;
            }
        }
        else
        {
            FlashAlert::errorMessage('Er is geen chatgeschiedenis gevonden voor deze scholier.');
            return false;
        }

        FlashAlert::successfulMessage('The messages and the thread was successfully deleted!');
        return true;

    }
}