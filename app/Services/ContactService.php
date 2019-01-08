<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 08/10/15
 * Time: 13:16
 */

namespace App\Services;


use App\Contact;
use App\FlashAlert;
use Illuminate\Validation\Validator;

class ContactService implements ContactServiceContract
{

    public function saveContact($request)
    {


        dd($request->get('tip_sugg_complaint'));
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
        $contact->update();
        FlashAlert::successfulMessage('Contact form successfully saved!');
        return true;
    }
}