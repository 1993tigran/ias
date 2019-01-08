<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 21/09/15
 * Time: 16:15
 */

namespace App\Services;


interface StudentServiceContract
{
        public function getStudentsList($page, $rows, $filter);

        public function deleteStudent($studentId);

        public function sendMessage($request);

        public function getStudentByName($filter);
}