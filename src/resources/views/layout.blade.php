<!DOCTYPE html>
<html lang="{{ substr(config('app.locale'), 0, 2) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <title>{{
    isset($title)
        ? $title . config('bytenet.base.title_separator') . config('bytenet.base.project_name') . ' Admin'
        : config('bytenet.base.project_name').' Admin'
    }}</title>


    @yield('before_styles')



    <link rel="stylesheet" href="{{ mix('admin/css/app.css') }}">

    {{-- ***** BootstrapCDN.com - START ***** --}}
    {{--
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bootstrap/css/bootstrap.min.css">
    --}}

    {{--
    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin-ext">
    --}}

    {{--
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
    --}}
    {{-- ****** BootstrapCDN.com - END ****** --}}

    {{--
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/skins/skin-blue.min.css">
    --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--
    <!-- Bytenet Base CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bytenet/bytenet.base.css') }}">
    --}}



    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ mix('admin/js/app.js') }}"></script>


@yield('after_styles')


</head>

{{--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
--}}

    <body class="hold-transition {{ config('bytenet.base.skin') }} sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('') }}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini">{!! config('bytenet.base.logo_sm') !!}</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">{!! config('bytenet.base.logo_lg') !!}</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">{{ trans('bytenet-base::base.toggle_navigation') }}</span>
              </a>

              @include('bytenet-base::inc.menu')
            </nav>
        </header>

      <!-- =============================================== -->

      @include('bytenet-base::inc.sidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         @yield('header')
        </section>

        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
          @if (config('bytenet.base.show_powered_by'))
              <div class="pull-right hidden-xs">
                  {{ trans('bytenet-base::base.powered_by') }}
                  <a target="_blank" href="https://github.com/ByteNet-Serbia/LaravelBase">Lara BTNT</a>
              </div>
          @endif

            <strong>{{ trans('bytenet-base::base.copyright') }} &copy; {{ date('Y.') }}</strong>
            {{ trans('bytenet-base::base.handcrafted_by') }}
            <a target="_blank" href="{{ config('bytenet.base.developer_link') }}">{{ config('bytenet.base.developer_name') }}</a>.
            {{ trans('bytenet-base::base.all_rights_reserved') }}.
      </footer>


        @include('bytenet-base::inc.sidebar_control')

    </div>
    <!-- ./wrapper -->


    @yield('before_scripts')

    <!-- REQUIRED JS SCRIPTS -->

    {{--
    <!-- jQuery 2.2.3 -->
    <!-- <script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    --}}
    {{--
    <!-- Bootstrap 3.3.7 -->
    <!-- <script src="{{ asset('vendor/adminlte') }}/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    --}}
    {{--
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte') }}/dist/js/app.min.js"></script>
    --}}
    {{-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. --}}

    @include('bytenet-base::inc.alerts')

    @yield('after_scripts')

</body>
</html>
