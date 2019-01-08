<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 12/01/16
 * Time: 13:01
 */

namespace App\Http\Controllers;

use App\Services\ClassServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClassesController extends Controller
{

    public function getCreateClass()
    {
        return view('classes.create');
    }

    public function postCreateClass(Request $request, ClassServiceContract $classServiceContract)
    {
        $response = $classServiceContract->saveClass($request);
        if($response)
        {
            return Redirect::route('backend_get_classes_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getClassesDashboard()
    {
        return view('classes.dashboard');
    }

    public function getClassesListJson(Request $request, ClassServiceContract $classServiceContract)
    {
        $page = $request->get('page');
        $rows = $request->get('rows');
        $response = $classServiceContract->getClassesList($page,$rows);
        return \Response::json($response);
    }

    public function getEdit($classId , ClassServiceContract $classServiceContract)
    {
        $class = $classServiceContract->getClassById($classId);
        if($class)
        {
            return view('classes.edit',['model' => $class]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function putEdit(Request $request, ClassServiceContract $classServiceContract)
    {
        $response = $classServiceContract->saveClass($request);
        if($response)
        {
            return Redirect::route('backend_get_classes_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getDelete($classId, ClassServiceContract $classServiceContract)
    {
        $class = $classServiceContract->getClassById($classId);
        if($class)
        {
            $class->delete();
            return Redirect::route('backend_get_classes_dashboard');
        }
        else
        {
            return Redirect::back();
        }
    }

}