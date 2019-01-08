<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 01/10/15
 * Time: 14:10
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['thread_id' , 'sender_id', 'message' , 'sender_type' ,'read'];


    public function senderUser()
    {
        return $this->hasOne(User::class,'id', 'sender_id');
    }

}