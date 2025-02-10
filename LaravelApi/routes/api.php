<?php

use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['prefix' => 'v1', 'middleware' => JwtMiddleware::class], function ($api) {

        $api->get('/', 'App\Http\Controllers\Api\v1\UserController@index');
        $api->get('users', 'App\Http\Controllers\Api\v1\UserController@show');
        $api->get('getuser', 'App\Http\Controllers\AuthController@getUser');

    });

    $api->group(['prefix' => 'auth'], function ($api) {
        $api->post('register', 'App\Http\Controllers\AuthController@register');
        $api->post('login', 'App\Http\Controllers\AuthController@login');
    });

});

$api->version('v2', function ($api) {

    $api->group(['prefix' => 'v2', 'middleware' => JwtMiddleware::class], function ($api) {

        $api->get('/', 'App\Http\Controllers\Api\v2\UserController@index');
        $api->get('users', 'App\Http\Controllers\Api\v2\UserController@show');
        $api->get('getuser', 'App\Http\Controllers\AuthController@getUser');
    });

    $api->group(['prefix' => 'auth'], function ($api) {
        $api->post('register', 'App\Http\Controllers\AuthController@register');
        $api->post('login', 'App\Http\Controllers\AuthController@login');
    });

});