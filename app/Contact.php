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

class Contact extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_form';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tip_sugg_complaint','advice','data','data_name','class','phone'];

    public function rules()
    {
        return [
            'tip_sugg_complaint' => 'required',
            'advice' => 'required',
            'data' => 'required',
            'data_name' => 'required',
            'class' => 'required',
            'phone' => 'required',
        ];
    }

    public static function saveRequest($request){

        $tip_sugg_complaint = $request->get('tip_sugg_complaint');

        $advice = $request->get('advice');
        $data = $request->get('data');
        $data_name = $request->get('data_name');
        $class = $request->get('class');
        $phone = $request->get('phone');
        $contact = new Contact();

        $contact->tip_sugg_complaint = $tip_sugg_complaint;
        $contact->advice = $advice;
        $contact->data = $data;
        $contact->data_name = $data_name;
        $contact->class = $class;
        $contact->phone = $phone;
        if ($contact->save()){
            FlashAlert::successfulMessage('Contact form successfully saved!');
            return true;
        }
        return false;


    }
}