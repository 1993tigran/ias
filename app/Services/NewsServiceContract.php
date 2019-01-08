<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 22/09/15
 * Time: 16:54
 */

namespace App\Services;


interface NewsServiceContract
{

    public function saveNews($request);

    public function getNewsList($page, $rows);

    public function delete($newsArticleId);

    public function getNewsArticleById($newsArticleId);

    public function editNewsArticle($request);

}