<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 22/09/15
 * Time: 16:53
 */

namespace App\Services;


use App\FlashAlert;
use App\News;
use Illuminate\Database\QueryException;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;

class NewsService implements NewsServiceContract
{

    public function saveNews($request)
    {
        $errorMessage = '';
        $message= "You must insert : ";
        if(!$request->get('title'))
        {
            $errorMessage.='the title for the article ';
        }
        $content = str_replace(' ', '', $request->get('content'));
        if($content == '')
        {
            if($errorMessage!='')
            {
                $errorMessage.=',the content ';
            }
            else
            {
                $errorMessage.='the content ';
            }
        }
        $image = $request->file('image');
        if(!$image)
        {
            if($errorMessage!='')
            {
                $errorMessage.=',the picture for the article ';
            }
            else
            {
                $errorMessage.='the picture for the article ';
            }
        }

        if($errorMessage!='')
        {
            FlashAlert::errorMessage($message.$errorMessage.'!');
            return false;
        }

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = $request->get('title') . rand(11111, 99999) . '.' . $extension;
        $file->move($destinationPath, $fileName);

        $pictureAddress = $destinationPath . '/' . $fileName;
        $picture = Image::make($pictureAddress)->fit(500, 400);
        $picture->save($pictureAddress);

        $news = new News();
        $news->title = $request->get('title');
        $news->content = $request->get('content');
        $news->photo = $destinationPath.'/'.$fileName;
        try{

            $news->save();
        }
        catch (QueryException $e)
        {
            FlashAlert::errorMessage('There was a problem with saving this article.Please try again!');
            return false;
        }
        FlashAlert::successfulMessage('The article was created!');
        return true;

    }

    public function getNewsList($page, $rows)
    {
        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
        $news = News::orderBy('created_at','desc')->paginate($rows)->toArray();
        return $news;
    }

    public function delete($newsArticleId)
    {
        $news = News::find($newsArticleId);
        if($news)
        {
            $title = $news->title;
            $news->delete();
            FlashAlert::successfulMessage('The news article "'.$title.'" was successfully deleted!');
            return true;
        }
        else
        {
            FlashAlert::errorMessage('The article cannot be found! Please try again!');
            return false;
        }
    }

    public function getNewsArticleById($newsArticleId)
    {
        $news = News::find($newsArticleId);
        if($news)
        {
            return $news;
        }
        else
        {
            FlashAlert::errorMessage('The article cannot be found! Please try again!');
            return false;
        }
    }

    public function editNewsArticle($request)
    {
        $updated = false;
        $news = News::find($request->get('id'));
        if($news)
        {
            if($request->get('title'))
            {
                $news->title = $request->get('title');
                $updated = true;
            }
            $content = str_replace(' ', '', $request->get('content'));
            if(!$content == '')
            {
                $news->content = $request->get('content');
                $updated = true;
            }
            $image = $request->file('image');
            if($image)
            {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $extension = $file->getClientOriginalExtension();
                $fileName = $request->get('title') . rand(11111, 99999) . '.' . $extension;
                $file->move($destinationPath, $fileName);

                $pictureAddress = $destinationPath . '/' . $fileName;
                $picture = Image::make($pictureAddress)->fit(500, 400);
                $picture->save($pictureAddress);

                $news->photo = $destinationPath.'/'.$fileName;
                $updated = true;
            }

            if($updated)
            {
                $news->update();
                FlashAlert::successfulMessage('The news article was updated!');
            }
            return true;
        }
        else
        {
            FlashAlert::errorMessage('The article cannot be found! Please try again!');
            return false;
        }
    }
}