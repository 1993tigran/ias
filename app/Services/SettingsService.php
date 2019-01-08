<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 08/10/15
 * Time: 13:16
 */

namespace App\Services;


use App\FlashAlert;
use App\Settings;

class SettingsService implements SettingsServiceContract
{

    public function saveSettings($request)
    {
        $redEmail = $request->get('report_red_issue_email');
        $orangeEmail = $request->get('report_orange_issue_email');
        $greenEmail = $request->get('report_green_issue_email');
        $settings = Settings::find($request->get('id'));
        if (empty($settings)){
            $settings = new Settings();
        }
        $settings->report_green_issue_email = $greenEmail;
        $settings->report_orange_issue_email = $orangeEmail;
        $settings->report_red_issue_email = $redEmail;
        $settings->save();
        FlashAlert::successfulMessage('Settings successfully saved!');
        return true;
    }
}