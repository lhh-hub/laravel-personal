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

/*
$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function ($api) {
        $api->group(["namespace" => "App\Http\Controllers\Api" ], function ($api) {
            $api->post('register', 'AuthController@register')->name('register');
            $api->post('login', 'AuthController@login')->name('login');
        });
        $api->group(["namespace" => "App\Http\Controllers\Api",'middleware' => 'auth:api' ], function ($api) {
            $api->post('test', 'UserController@index');
            $api->post('logout', 'AuthController@logout')->name('logout');
        });
});*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(["namespace" => "App\Http\Controllers\Api" ], function ($api) {
        $api->get('/user/login','JwtLoginController@login');
        $api->group([ 'middleware' => 'jwt_auth' ], function ($api) {
            $api->get('user/info','UserController@info');
        });

    });
});

