<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 01/10/15
 * Time: 12:07
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'device';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['os', 'udid' , 'push_token' , 'environment' , 'user_id'];

}