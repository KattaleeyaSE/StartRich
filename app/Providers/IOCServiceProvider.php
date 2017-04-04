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
        $this->app->bind(
            'App\IRepositories\ISuitabilityTestRepository',
            'App\Repositories\SuitabilityTestRepository'
        );        
        $this->app->bind(
            'App\IRepositories\ISuitabilityTestMemberRepository',
            'App\Repositories\SuitabilityTestMemberRepository'
        );        

        $this->app->bind(
            'App\IServices\ISuitabilityTestService',
            'App\Services\SuitabilityTestService'
        );        

        $this->app->bind(
            'App\IRepositories\IMutualFundRepository',
            'App\Repositories\MutualFundRepository'
        );        

        $this->app->bind(
            'App\IRepositories\IEstimateProfileRepository',
            'App\Repositories\EstimateProfileRepository'
        );        
    }
}
