<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 22/09/15
 * Time: 14:25
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'photo'];


}