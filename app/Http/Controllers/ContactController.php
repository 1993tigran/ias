<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 08/10/15
 * Time: 12:43
 */

namespace App\Http\Controllers;

use App\Services\ContactServiceContract;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Input;



class ContactController extends Controller
{

    public function getContact()
    {
        $model = new Contact();

        return view('contact.contact-form' , ['model' => $model]);
    }

    public function postContact(Request $request)
    {
        $rules = [
            'tip_sugg_complaint' => 'required',
            'advice' => 'required',
            'data' => 'required',
            'data_name' => 'required',
            'class' => 'required|numeric',
            'phone' => 'required|numeric',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('contact-form')
                ->withErrors($validator)->withInput();
        }else{
            $result = Contact::saveRequest($request);
            if($result)
            {
                return Redirect::route('contact-get-form');
            }else{
                return Redirect::back();
            }
        }

    }
}