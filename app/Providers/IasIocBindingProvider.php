<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 16/09/15
 * Time: 15:58
 */

namespace App\Providers;

/**
 * Default
 */
use Illuminate\Support\ServiceProvider;

/**
 * Used Classes
 */
use App\Services\ApiService;
use App\Services\ApiServiceContract;
use App\Services\IssuesService;
use App\Services\IssuesServiceContract;
use App\Services\NewsService;
use App\Services\NewsServiceContract;
use App\Services\SettingsService;
use App\Services\SettingsServiceContract;
use App\Services\StudentService;
use App\Services\StudentServiceContract;
use App\Services\TeacherService;
use App\Services\TeacherServiceContract;
use App\Services\TipsService;
use App\Services\TipsServiceContract;
use App\Services\ClassService;
use App\Services\ClassServiceContract;


class IasIocBindingProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ApiServiceContract::class,
            ApiService::class);
        $this->app->singleton(TeacherServiceContract::class,
            TeacherService::class);
        $this->app->singleton(StudentServiceContract::class,
            StudentService::class);
        $this->app->singleton(NewsServiceContract::class,
            NewsService::class);
        $this->app->singleton(IssuesServiceContract::class,
            IssuesService::class);
        $this->app->singleton(TipsServiceContract::class,
            TipsService::class);
        $this->app->singleton(SettingsServiceContract::class,
            SettingsService::class);
        $this->app->singleton(ClassServiceContract::class,
            ClassService::class);
    }

}

