<?php

Route::group([
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ],
    'prefix' => LaravelLocalization::setLocale(),
    'as' => LaravelLocalization::setLocale() ? LaravelLocalization::setLocale() . "." : "",
], function() {


    Route::group([
        'middleware' => 'web',
        'prefix' => config('bytenet.base.route_prefix'),
        'namespace' => 'ByteNet\LaravelBase\app\Http\Controllers',
        'as' => config('bytenet.base.route_prefix') . '::',
    ], function ($router) {

        // if not otherwise configured, setup the auth routes
        if (config('bytenet.base.setup_auth_routes')) {
            Route::auth();
            Route::get('logout', 'Auth\LoginController@logout');
        }

        // if not otherwise configured, setup the dashboard routes
        if (config('bytenet.base.setup_dashboard_routes')) {
            Route::name('dashboard.index')->get('dashboard', 'BaseController@dashboard');
            Route::name('index')->get('/', function () {
                // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
                return redirect(
                    (LaravelLocalization::setLocale() ? LaravelLocalization::setLocale() . "/" : "")
                    . config('bytenet.base.route_prefix') . '/dashboard'
                );
            });
        }
    });

});
