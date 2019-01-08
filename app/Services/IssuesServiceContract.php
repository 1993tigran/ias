<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 02/10/15
 * Time: 12:47
 */

namespace App\Services;


interface IssuesServiceContract
{

    public function getIssuesList($filter);

    public function findReport($reportId);

    public function getIssueQuestions($filter, $threadId);

    public function findThread($reportId);

    public function getChatHistory($filter, $threadId);

    public function deleteThread($threadId);
}