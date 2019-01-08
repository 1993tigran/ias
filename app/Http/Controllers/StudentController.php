<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 21/09/15
 * Time: 16:13
 */

namespace App\Http\Controllers;

use App\Services\StudentServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{

    public function getDashboard()
    {
        return view('students.dashboard');
    }

    public function getListJson(Request $request, StudentServiceContract $serviceContract)
    {

        $page = $request->get('page');
        $rows = $request->get('rows');
        $filter = $request->get('q');
        $result = $serviceContract->getStudentsList($page, $rows, $filter);
        return response()->json($result);
    }
    public function getDeleteStudent($studentId, StudentServiceContract $serviceContract)
    {
        $response = $serviceContract->deleteStudent($studentId);
        if($response)
        {
            return Redirect::route('backend_get_students_dashboard');
        }else
        {
            return Redirect::back()->withInput();
        }
    }

    public function postSendMessage(Request $request, StudentServiceContract $serviceContract)
    {
        $serviceContract->sendMessage($request);
        return Redirect::route('backend_get_students_dashboard');
    }

    public function getStudentByName(Request $request , StudentServiceContract $serviceContract)
    {
        $filter = $request->get('q');
        $response = $serviceContract->getStudentByName($filter);
        return response()->json($response);
    }
}