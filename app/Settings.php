<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 08/10/15
 * Time: 13:17
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['report_red_issue_email' , 'report_orange_issue_email' , 'report_green_issue_email'];

    public $timestamps = false;

}