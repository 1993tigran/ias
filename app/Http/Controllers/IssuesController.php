<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 02/10/15
 * Time: 12:25
 */

namespace App\Http\Controllers;

use App\IssueReport;
use App\ReportQuestion;
use App\Services\IssuesServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class IssuesController extends Controller
{

    public function getDashboard()
    {
        return view('issues.dashboard');
    }

    public function getIssuesJson(Request $request, IssuesServiceContract $serviceContract)
    {
        $filter['rows'] = $request->get('rows');
        $filter['page'] = $request->get('page');
        $result = $serviceContract->getIssuesList($filter);
        return response()->json($result);
    }

    public function getIssueQuestionsDashboard($reportId, IssuesServiceContract $serviceContract)
    {
        $result = $serviceContract->findReport($reportId);
        if($result)
        {
            return view('issues.questions',['model' => $result]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function getIssueQuestionsJson($issueQuestionId, Request $request , IssuesServiceContract $serviceContract)
    {
        $filter['rows'] = $request->get('rows');
        $filter['page'] = $request->get('page');
        $result = $serviceContract->getIssueQuestions($filter,$issueQuestionId);
        return response()->json($result);
    }

    public function getDeleteIssue($issueReportId)
    {
        $issue = IssueReport::find($issueReportId);
        $issue->delete();
        $answers = ReportQuestion::where(['issue_report_id' => $issueReportId])->get();
        foreach($answers as $answer)
        {
            $answer->delete();
        }
        return Redirect::route('backend_get_issues_dashboard');
    }

    public function getChatHistoryDashboard($threadId, IssuesServiceContract $serviceContract)
    {
        $result = $serviceContract->findThread($threadId);
        if($result)
        {
            return view('issues.chat-history',['model' => $result]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function getChatHistoryJson($threadId, Request $request, IssuesServiceContract $serviceContract)
    {
        $filter['rows'] = $request->get('rows');
        $filter['page'] = $request->get('page');
        $result = $serviceContract->getChatHistory($filter,$threadId);
        return response()->json($result);
    }

    public function getDeleteChat($threadId, IssuesServiceContract $serviceContract)
    {
        $result = $serviceContract->deleteThread($threadId);
        if($result)
        {
            return Redirect::route('backend_get_issues_dashboard');
        }
        else
        {
            return Redirect::back();
        }
    }
}