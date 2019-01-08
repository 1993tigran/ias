<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 08/10/15
 * Time: 12:43
 */

namespace App\Http\Controllers;

use App\Services\SettingsServiceContract;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;



class SettingsController extends Controller
{

    public function getSettings()
    {
        $model = Settings::first();
        return view('settings.settings' , [
            'model' => $model,
            'user_id' => Auth::id()
        ]);
    }

    public function postSettings(Request $request, SettingsServiceContract $serviceContract)
    {
        $result = $serviceContract->saveSettings($request);
        if($result)
        {
            return Redirect::route('backend_get_settings');
        }
    }
}