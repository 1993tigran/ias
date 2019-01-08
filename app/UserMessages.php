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

class UserMessages extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sender_id', 'message_id', 'user_id'];

    public function recaiver()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function message()
    {
        return $this->hasOne(ChatMessage::class,'id', 'message_id');
    }

    public function sender()
    {
        return $this->hasOne(User::class,'id', 'sender_id');
    }




}