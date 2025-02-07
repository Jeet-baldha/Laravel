<?php

use Dingo\Api\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::get('/a', function () {
    return 'Welcome to our API';
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/fa', function () {
        return ['Fruits' => 'Delicious and healthy!'];
    });
});

?>