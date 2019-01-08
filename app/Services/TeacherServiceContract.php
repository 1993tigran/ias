<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 17/09/15
 * Time: 17:03
 */

namespace App\Services;


interface TeacherServiceContract
{

    public function createTeacher($request);

    public function getTeachersList($sord, $page, $rows);

    public function deleteTeacher($teacherId);

    public function getTeacherById($teacherId);

    public function postEditTeacher($request);

}