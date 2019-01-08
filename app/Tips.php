<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 07/10/15
 * Time: 12:59
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];


}