<?php

namespace ByteNet\LaravelBase\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admins';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->redirectTo = "/" . config('bytenet.base.route_prefix');

        $this->middleware("guest", ['except' => 'logout']);
    }

    // -------------------------------------------------------
    // Laravel overwrites for loading bytenet views
    // -------------------------------------------------------

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $title = trans('bytenet-base::base.login'); // set the page title

        return view('bytenet-base::auth.login', compact('title'))
            ->with('locale', locale());
    }

    /**
     * Redirect path
     *
     * @return string Path to redirect
     */
    public function redirectTo()
    {
        return locale() . $this->redirectTo;
    }
}
