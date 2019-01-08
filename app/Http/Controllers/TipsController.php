<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 07/10/15
 * Time: 12:01
 */

namespace App\Http\Controllers;

use App\Services\TipsServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipsController extends Controller
{

    public function getCreateTips()
    {
        return view('tips.create');
    }

    public function postCreateTips(Request $request, TipsServiceContract $tipsServiceContract)
    {
        $result = $tipsServiceContract->saveTip($request);
        if($result)
        {
            return Redirect::route('backend_get_tips_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }

    }

    public function getDashboard()
    {
        return view('tips.dashboard');
    }

    public function getTipsJson(Request $request, TipsServiceContract $tipsServiceContract)
    {
        $filter['rows'] = $request->get('rows');
        $filter['page'] = $request->get('page');
        $result = $tipsServiceContract->getTipsListPaginated($filter);
        return response()->json($result);
    }

    public function getEditTip($tipId, TipsServiceContract $tipsServiceContract)
    {
        $result = $tipsServiceContract->findTip($tipId);
        if($result)
        {
            return view('tips.edit' , [ 'model' => $result ]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function postEditTip(Request $request, TipsServiceContract $tipsServiceContract)
    {
        $result = $tipsServiceContract->editTip($request);
        if($result)
        {
            return Redirect::route('backend_get_tips_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getDeleteTip($tipId, TipsServiceContract $tipsServiceContract)
    {
        $result = $tipsServiceContract->deleteTip($tipId);
        if($result)
        {
            return Redirect::route('backend_get_tips_dashboard');
        }
        else
        {
            return Redirect::back();
        }
    }
}