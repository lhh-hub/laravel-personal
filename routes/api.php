<?php



$api = app("Dingo\Api\Routing\Router");

$api->group(['prefix' => 'auth',"namespace" => "App\Http\Controllers\V1"], function ($api) {

    $api->post('login', 'AuthController@login');
    $api->post('logout', 'AuthController@logout');
    $api->post('refresh', 'AuthController@refresh');
    $api->post('me', 'AuthController@me');

});