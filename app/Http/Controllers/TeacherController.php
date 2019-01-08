<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 17/09/15
 * Time: 16:41
 */

namespace App\Http\Controllers;

use App\Classes;
use App\Services\TeacherServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{

    public function getRegister()
    {
        $classes = Classes::lists('name','id');

        return view('teachers.create',[
            'classes' => $classes
        ]);
    }

    public function postRegister(Request $request, TeacherServiceContract $teacherServiceContract)
    {
        $response = $teacherServiceContract->createTeacher($request);
        if($response)
        {
            return Redirect::route('backend_get_teachers_dashboard');
        }else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getListJson(Request $request, TeacherServiceContract $teacherServiceContract)
    {
        $sord = $request->get('sord');
        $page = $request->get('page');
        $rows = $request->get('rows');
        $result = $teacherServiceContract->getTeachersList($sord,$page,$rows);
        return \Response::json($result);
    }

    public function getDashboard()
    {
        return view('teachers.dashboard');
    }

    public function getDeleteTeacher($teacherId, TeacherServiceContract $teacherServiceContract)
    {
        $response = $teacherServiceContract->deleteTeacher($teacherId);
        if($response)
        {
            return Redirect::route('backend_get_teachers_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getEditTeacher($teacherId, TeacherServiceContract $teacherServiceContract)
    {

        $response = $teacherServiceContract->getTeacherById($teacherId);
//        dd($response);
        $classes = Classes::lists('name','id');
        if($response)
        {
            return view('teachers.edit',[
                'model' => $response,
                'classes' => $classes
            ]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function postEditTeacher(Request $request, TeacherServiceContract $teacherServiceContract)
    {
        $response = $teacherServiceContract->postEditTeacher($request);
        if($response)
        {
            return Redirect::route('backend_get_teachers_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }
}