<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 12/01/16
 * Time: 13:07
 */

namespace App\Services;


use App\Classes;
use Illuminate\Pagination\Paginator;


class ClassService implements ClassServiceContract
{

    public function saveClass($request)
    {
        if($request->get('id'))
            $newClass = Classes::find($request->get('id'));
        else
            $newClass = new Classes();
        $newClass->name = $request->get('name');
        $newClass->save();
        return true;
    }

    public function getClassesList($page, $rows)
    {
        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
        $classes = Classes::orderBy('created_at','desc')->paginate($rows)->toArray();
        return $classes;
    }

    public function getClassById($classId)
    {
        $class = Classes::find($classId);
        if($class)
            return $class;
        else
            return false;
    }
}