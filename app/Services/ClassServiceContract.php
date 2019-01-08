<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 12/01/16
 * Time: 13:08
 */

namespace App\Services;


interface ClassServiceContract
{

    function saveClass($request);

    function getClassesList($page, $rows);

    function getClassById($classId);
}