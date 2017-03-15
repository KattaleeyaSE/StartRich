<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IOCServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Register for IOC Here
        $this->app->bind(
            'App\IRepositories\IUserRepository',
            'App\Repositories\UserRepository'
        );        
        $this->app->bind(
            'App\IRepositories\IMemberRepository',
            'App\Repositories\MemberRepository'
        );        
        $this->app->bind(
            'App\IRepositories\IAMCRepository',
            'App\Repositories\AMCRepository'
        );        
    }
}
