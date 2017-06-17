<?php

namespace ByteNet\LaravelBase\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->redirectTo = "/" . config('bytenet.base.route_prefix');

        $this->middleware("guest");
    }

    // -------------------------------------------------------
    // Laravel overwrites for loading bytenet views
    // -------------------------------------------------------

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        $title = trans('bytenet-base::base.reset_password'); // set the page title

        return view('bytenet-base::auth.passwords.reset')->with([
            'title' => $title,
            'token' => $token,
            'email' => $request->email,
            'locale' => locale(),
        ]);
    }
}
