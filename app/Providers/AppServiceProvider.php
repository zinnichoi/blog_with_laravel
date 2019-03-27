<?php

namespace App\Providers;

use App\Repositories\BlogRepositoryInterface;
use App\Repositories\Implement\BlogRepository;
use App\Repositories\Implement\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\BlogServiceInterface;
use App\Services\Implement\BlogService;
use App\Services\Implement\UploadFileService;
use App\Services\Implement\UserService;
use App\Services\UploadFileServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);
        $this->app->bind(UploadFileServiceInterface::class, UploadFileService::class);
    }
}
