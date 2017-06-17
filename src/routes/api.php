<?php

/*
if (config('bytenet.base.enable_using')) {

    if (config('bytenet.base.api_version')) {
        Route::middleware(['api', 'auth:api'])->get('/api', function (Request $request) {
            return redirect(config('bytenet.base.api_route_prefix') . '/' . config('bytenet.base.api_version'));
        });
    }

    Route::group([
        'middleware' => ['api', 'auth:api'],
        'prefix' => config('bytenet.base.api_route_prefix') . '/' . config('bytenet.base.api_version'),
        'namespace' => 'ByteNet\LaravelBase\app\Http\Controllers',
        'as' => config('bytenet.base.api_route_prefix') . '::',
    ], function ($router) {

        Route::name('index')->get('/', 'BaseController@index');

    });

}
*/

Route::group([], function ($router) {
    \Laravel\Passport\Passport::routes();
});
