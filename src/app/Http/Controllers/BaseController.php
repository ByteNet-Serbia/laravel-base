<?php

namespace ByteNet\LaravelBase\app\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware("bytenet.auth");
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {

        $title = trans('bytenet-base::base.dashboard'); // set the page title

        return view('bytenet-base::dashboard', compact('title'))->with('locale', locale());
    }
}
