<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 22/09/15
 * Time: 14:25
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


}