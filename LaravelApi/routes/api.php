<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['prefix' => 'v1'], function ($api) {

        $api->get('/', 'App\Http\Controllers\Api\v1\UserController@index');
        $api->get('users', 'App\Http\Controllers\Api\v1\UserController@show');

    });

});

$api->version('v2', function ($api) {

    $api->group(['prefix' => 'v2'], function ($api) {

        $api->get('/', 'App\Http\Controllers\Api\v2\UserController@index');
        $api->get('users', 'App\Http\Controllers\Api\v2\UserController@show');

    });
});