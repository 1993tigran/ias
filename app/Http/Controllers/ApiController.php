<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 16/09/15
 * Time: 15:44
 */

namespace App\Http\Controllers;

use App\Services\ApiServiceContract;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function postRegister(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->registerUser($request);
        return response()->json($response);
    }

    public function postLogin(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->login($request);
        return response()->json($response);
    }

    public function getCheckLogin(ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->checkLogin();
        return response()->json($response);
    }

    public function getLogout(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->logout($request);
        return response()->json($response);
    }

    public function postUpdateUser(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->updateUser($request);
        return response()->json($response);
    }

    public function getNews(ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->getNews();
        return response()->json($response);
    }

    public function getClasses(ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->getClasses();
        return response()->json($response);
    }

    public function saveIssue(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->saveIssue($request);
        return response()->json($response);
    }

    public function sendMessage(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->sendMessage($request);
        return response()->json($response);
    }

    public function getMessages(Request $request,ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->getMessages($request);
        return response()->json($response);
    }

    public function getTips(ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->getTips();
        return response()->json($response);
    }

    public function readMessage(Request $request, ApiServiceContract $apiServiceContract)
    {
        $messageId = $request->get('messageId');
        $response = $apiServiceContract->readMessage($messageId);
        return response()->json($response);
    }

    public function readThread(Request $request, ApiServiceContract $apiServiceContract)
    {
        $response = $apiServiceContract->readThread($request);
        return response()->json($response);
    }

    public function getStudentList(ApiServiceContract $apiServiceContract){
        $response = $apiServiceContract->getStudentList();
        return response()->json($response);
    }
}
