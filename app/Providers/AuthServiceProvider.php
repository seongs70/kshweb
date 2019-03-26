<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
//    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
//    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        
        Gate::define('update', function ($user, $model){
            return $user-> userNumber === $model->userNumber;
        });
        
        Gate::define('delete', function ($user, $model){
            return $user-> userNumber === $model->userNumber;
        });
        Gate::define('update', function ($user, $model){
            return $user-> registUser === $model->userId;
        });
        
        Gate::define('delete', function ($user, $model){
            return $user-> registUser === $model->userId;
        });
        
        
        //최고관리자
        
        Gate::before(function ($user) {
           if ($user->isAdmin()) {
                return true;
            }
        });

        

        
        //$gate->define('update','delete');
        
        //$this->registerPolicies();

        //
    }
}
