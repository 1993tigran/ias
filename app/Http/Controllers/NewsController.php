<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 22/09/15
 * Time: 14:37
 */

namespace App\Http\Controllers;

use App\Services\NewsServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class NewsController extends Controller
{

    public function getCreate()
    {
        return view('news.create');
    }

    public function postCreate(Request $request, NewsServiceContract $newsServiceContract)
    {
        $response = $newsServiceContract->saveNews($request);
        if($response)
        {
            return Redirect::route('backend_get_news_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getDashboard()
    {
        return view('news.dashboard');
    }

    public function getNewsListJson(Request $request, NewsServiceContract $newsServiceContract)
    {
        $page = $request->get('page');
        $rows = $request->get('rows');
        $response = $newsServiceContract->getNewsList($page,$rows);
        return \Response::json($response);
    }

    public function getDeleteNews($newsId, NewsServiceContract $newsServiceContract)
    {
        $response = $newsServiceContract->delete($newsId);
        if($response)
        {
            return Redirect::route('backend_get_news_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }
    }

    public function getEditNews($id, NewsServiceContract $newsServiceContract)
    {
        $response = $newsServiceContract->getNewsArticleById($id);
        if($response)
        {
            return view('news.edit',['model' => $response]);
        }
        else
        {
            return Redirect::back();
        }
    }

    public function postEditNews(Request $request, NewsServiceContract $newsServiceContract)
    {
        $response = $newsServiceContract->editNewsArticle($request);

        if($response)
        {
            return Redirect::route('backend_get_news_dashboard');
        }
        else
        {
            return Redirect::back()->withInput();
        }

    }
}