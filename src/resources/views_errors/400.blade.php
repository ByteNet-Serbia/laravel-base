<!DOCTYPE html>
<html lang="{{ substr(config('app.locale'), 0, 2) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Error 400 - {{ config('bytenet.base.project_name') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin-ext">

    <style>
      html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato', sans-serif;
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
      }

      .title {
        font-size: 156px;
      }

      .quote {
        font-size: 36px;
      }

      .explanation {
        font-size: 24px;
      }

      .bold {
          font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="title">400</div>
        <div class="quote">{{ trans('bytenet-base::base.bad_request') }}.</div>
        <div class="explanation">
            <br>
            <?php
            //$default_error_message = "Please return to <a href='".url('')."'>our homepage</a>.";
            $default_error_message = trans('bytenet-base::base.return_to_homepage_please', ['attribute' => '/']) . ".";
            ?>
            <p class="bold">
                <small>
                    {{-- isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message --}}
                    {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): '' !!}
                </small>
            </p>
            <p class="bold">
                <small>
                    {!!  $default_error_message !!}
                </small>
            </p>
       </div>
      </div>
    </div>
  </body>
</html>
