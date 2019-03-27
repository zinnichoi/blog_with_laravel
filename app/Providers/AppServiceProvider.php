<?php

namespace App\Providers;

use App\IRepositories\BlogRepositoryInterface;
use App\IRepositories\UserRepositoryInterface;
use App\IServices\BlogServiceInterface;
use App\IServices\UploadFileServiceInterface;
use App\IServices\UserServiceInterface;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;
use App\Services\BlogService;
use App\Services\UploadFileService;
use App\Services\UserService;
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
