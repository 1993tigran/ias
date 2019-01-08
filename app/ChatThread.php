<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 01/10/15
 * Time: 14:08
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ChatThread extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat_threads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id' , 'read'];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'thread_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}