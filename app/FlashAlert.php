<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 21/09/15
 * Time: 14:58
 */

namespace App;


use Illuminate\Support\Facades\Session;

class FlashAlert
{

    public static function errorMessage($message)
    {
        Session::flash('flash_error.message', $message);
    }

    public static function successfulMessage($message)
    {
        Session::flash('flash_success.message', $message);
    }
}