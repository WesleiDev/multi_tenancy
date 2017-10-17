<?php

$appUtl = config('app.url');
$tenantParam = config('tenant.route_param');
$domain = parse_url($appUtl)['host'];

Route::domain("{{$tenantParam}}.$domain")
    ->middleware('tenant')
    ->group(function(){

        Route::Auth();

        Route::get('/', function () {
            return view('welcome');
        });


        Route::get('/test', function($tenant){
            dd(config('auth.defaults'));
           return "Hello Word ".$tenant;
        });

        Route::prefix('/admin')
            ->middleware('auth:web')
            ->group(function(){
            Route::get('/', function(){
                return "Admin";
            });
        });

        Route::prefix('/app')
            ->middleware('auth:web_tenants')
            ->group(function(){
            Route::resource('categories', 'CategoriesController');
            Route::get('/', function(){
                return "App Multi Tenancy";
            });
        });
        Route::get('/home', 'HomeController@index')->name('home');

    });
//Route::Auth();




