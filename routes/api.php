<?php



//$api = app("Dingo\Api\Routing\Router");
//$api->version('v1', function ($api) {
//    $api->group(["namespace" => "App\Http\Controllers"], function ($api) {
//
//        $api->post('login', 'AuthController@login');
//        $api->post('logout', 'AuthController@logout');
//        $api->post('refresh', 'AuthController@refresh');
//        $api->get('index', 'IndexController@index');
//        $api->get('me', 'AuthController@me');
//
//    });
//});

//Route::version('v1', function ($router) {
//    Route::group([
//
//        'prefix' => 'auth'
//
//    ], function ($router) {
//
//        Route::post('login', 'AuthController@login');
//        Route::post('logout', 'AuthController@logout');
//        Route::post('refresh', 'AuthController@refresh');
//        Route::post('me', 'AuthController@me');
//
//    });
//});

$api = app('Dingo\Api\Routing\Router');

//$api->get('index/{id}', 'App\Http\Controllers\IndexController@index');
$api->version('v1', function ($api) {

    $api->post('login', 'App\Http\Controllers\Api\AuthController@login');
});