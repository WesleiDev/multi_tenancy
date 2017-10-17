<?php

namespace App\Providers;

use App\Routing\Redirector;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        DB::listen(function(QueryExecuted $query){
            \Log::info($query->sql);
            \Log::info($query->bindings);


        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend('redirect', function($redirectorOriginal, $app){
           $redirector = new Redirector($app['url']);

            if(isset($app['session.store'])){
                $redirector->setSession($app['session.store']);
            }

            return $redirector;
        });
    }
}
