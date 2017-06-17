<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ByteNet\LaravelBase customizations
    |--------------------------------------------------------------------------
    |
    | Make it yours.
    |
    */

    // Project name. Shown in the breadcrumbs and a few other places.
    'project_name' => config('app.name'),

    // Menu logos
    'logo_lg'   => env('CLIENT_LOGO_LG', '<strong>Byte Net</strong> CMS'),
    'logo_sm' => env('CLIENT_LOGO_SM', '<strong>BTNT</strong>'),
    'icon_main' => '<i class="fa fa-dashboard"></i>',

    // Developer or company name. Shown in footer.
    'developer_name' => 'Byte Net',

    // Developer website. Link in footer.
    'developer_link' => '//bytenet.rs',

    // Show powered by Lara BTNT in the footer?
    'show_powered_by' => true,

    // The AdminLTE skin. Affects menu color and primary/secondary colors used throughout the application.
    'skin' => 'skin-blue',
    // Options: skin-black, skin-blue, skin-purple, skin-red, skin-yellow, skin-green

    // Date & Datetime Format Syntax: https://github.com/jenssegers/date#usage
    // (same as Carbon)
    'default_date_format'     => 'j F Y',
    'default_datetime_format' => 'j F Y H:i',

    // set title tag separator
    'title_separator'         => ' - ',

    /*
    |--------------------------------------------------------------------------
    | Registration Open
    |--------------------------------------------------------------------------
    |
    | Choose wether new users are allowed to register.
    | This will show up the Register button in the menu and allow access to the
    | Register functions in AuthController.
    |
    */

    'registration_open' => true,
    'login_open' => true,
    'api_enabled' => true,


    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // The prefix used in all base routes (the 'admins' in admins/dashboard)
    'route_prefix' => 'admins',

    // Set this to false if you would like to use your own AuthController and PasswordController
    // (you then need to setup your auth routes manually in your routes/web.php file)
    'setup_auth_routes' => true,

    // Set this to false if you would like to skip adding the dashboard routes
    // (you then need to overwrite the login route on your AuthController)
    'setup_dashboard_routes' => true,

    // The prefix and version used in all base routes (the 'api' and 'v1' in api/v1/users)
    'api_route_prefix' => 'api',
    'api_version' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    */

    // Fully qualified namespace of the User model
    'user_model_fqn' => '\App\User',

    /*
    |--------------------------------------------------------------------------
    | Visual representations
    |--------------------------------------------------------------------------
    */
    'icon_active'            => '<i class="fa fa-check-square text-success"></i>',
    'icon_inactive'          => '<i class="fa fa-minus-square text-danger"></i>',

    'icon_create'           => '<i class="fa fa-plus"></i>&nbsp;',
    'icon_read'             => '<i class="fa fa-eye"></i>&nbsp;',
    'icon_update'           => '<i class="fa fa-pencil"></i>&nbsp;',
    'icon_delete'           => '<i class="fa fa-trash-o"></i>&nbsp;',
    'icon_save'             => '<i class="fa fa-plus-square-o"></i>&nbsp;',
    'icon_close'            => '<i class="fa fa-times"></i>&nbsp;',
    'icon_reset'            => '<i class="fa fa-eraser"></i>&nbsp;',

    'class_btn_create'      => 'btn btn-success btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_read'        => 'btn btn-default btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_update'      => 'btn btn-default btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_delete'      => 'btn btn-danger  btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_save'        => 'btn btn-primary btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_close'       => 'btn btn-default btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
    'class_btn_reset'       => 'btn btn-default btn-sm m-t-5 m-b-5 m-l-5 p-l-20 p-r-20',
];
