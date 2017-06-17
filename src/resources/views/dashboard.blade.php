@extends('bytenet-base::layout')

@section('header')
      <h1>
          {!! config('bytenet.base.icon_main') !!}
          {{ trans('bytenet-base::base.dashboard') }}<small>{{ trans('bytenet-base::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li>
            <a href="{{ $locale . "/" . config('bytenet.base.route_prefix') . "/dashboard"}}">
                {{ config('bytenet.base.project_name') }}
            </a>
        </li>
        <li class="active">{{ trans('bytenet-base::base.dashboard') }}</li>
      </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('bytenet-base::base.login_status') }}</div>
                </div>

                <div class="box-body">{{ trans('bytenet-base::base.logged_in') }}</div>
                <table class="table table-responsive">
                    <tr><th>getLocalizedURL:</th><td>{{ LaravelLocalization::getLocalizedURL() }}</td></tr>
                    <tr><th>getNonLocalizedURL:</th><td>{{ LaravelLocalization::getNonLocalizedURL() }}</td></tr>
                    <tr><th>getURLFromRouteNameTranslated:</th><td>n/a</td></tr>
                    <tr><th>getSupportedLocales:</th><td>{{ var_dump(LaravelLocalization::getSupportedLocales()) }}</td></tr>
                    <tr><th>getLocalesOrder:</th><td>{{ var_dump(LaravelLocalization::getLocalesOrder()) }}</td></tr>
                    <tr><th>getSupportedLanguagesKeys:</th><td>{{ var_dump(LaravelLocalization::getSupportedLanguagesKeys()) }}</td></tr>
                    <tr><th>setLocale:</th><td>{{ LaravelLocalization::setLocale() }}</td></tr>
                    <tr><th>getCurrentLocale:</th><td>{{ LaravelLocalization::getCurrentLocale() }}</td></tr>
                    <tr><th>getCurrentLocaleName:</th><td>{{ LaravelLocalization::getCurrentLocaleName() }}</td></tr>
                    <tr><th>getCurrentLocaleDirection:</th><td>{{ LaravelLocalization::getCurrentLocaleDirection() }}</td></tr>
                    <tr><th>getCurrentLocaleScript:</th><td>{{ LaravelLocalization::getCurrentLocaleScript() }}</td></tr>
                </table>
                <br>
            </div>
        </div>
    </div>
@endsection
