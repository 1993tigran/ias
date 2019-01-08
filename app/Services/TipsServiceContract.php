<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 07/10/15
 * Time: 12:04
 */

namespace App\Services;


interface TipsServiceContract
{

    public function saveTip($request);

    public function getTipsListPaginated($filter);

    public function findTip($tipId);

    public function editTip($request);

    public function deleteTip($tipId);

}