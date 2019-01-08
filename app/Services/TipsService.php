<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Email: opreacristianalexandru@gmail.com
 * Date: 07/10/15
 * Time: 12:03
 */

namespace App\Services;


use App\FlashAlert;
use App\Tips;
use Illuminate\Pagination\Paginator;
use PhpParser\Error;

class TipsService implements TipsServiceContract
{

    public function saveTip($request)
    {
        $content = $request->get('content');
        $tip = new Tips();
        $tip->content = $content;
        try{
            $tip->save();
            FlashAlert::successfulMessage('The tip was successfully saved!');
            return true;
        }
        catch (Error $e)
        {
            FlashAlert::errorMessage('There was a problem.Please try again!');
            return false;
        }
    }

    public function getTipsListPaginated($filter)
    {
        Paginator::currentPageResolver(function() use ($filter) {
            return $filter['page'];
        });
        $issues = Tips::orderBy('created_at','desc')
            ->paginate($filter['rows'])
            ->toArray();
        return $issues;
    }

    public function findTip($tipId)
    {
        $tip = Tips::find($tipId);
        if($tip)
        {
            return $tip;
        }
        else
        {
            FlashAlert::errorMessage('This id is incorrect. Please try again!');
            return false;
        }
    }

    public function editTip($request)
    {
        $tipId = $request->get('id');
        $content = $request->get('content');
        $tip = Tips::find($tipId);
        if($tip)
        {
            $tip->content = $content;
            try
            {
                $tip->update();
                FlashAlert::successfulMessage('The tip was successfully modified!');
                return true;
            }
            catch (Error $e)
            {
                FlashAlert::errorMessage('There was a problem with saving the tip.Please try again!');
                return false;
            }
        }
        else
        {
            FlashAlert::errorMessage('There was a problem in finding this tip.Please try again!');
            return false;
        }
    }

    public function deleteTip($tipId)
    {
        $tip = $this->findTip($tipId);
        if($tip)
        {
            try
            {
                $tip->delete();
                FlashAlert::successfulMessage('The tip was successfully deleted!');
                return true;
            }
            catch(Error $e)
            {
                FlashAlert::errorMessage('There was a problem in deleting this tip.Please try again!');
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}