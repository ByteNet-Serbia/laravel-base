<?php

namespace ByteNet\LaravelBase\App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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

        $this->middleware("guest");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // if registration is closed, deny access
        if (! config('bytenet.base.registration_open')) {
            abort(403, trans('bytenet-base::base.registration_closed'));
        }
        
        $title = trans('bytenet-base::base.register'); // set the page title

        return view('bytenet-base::auth.register', compact('title'))
            ->with('locale', locale());
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // if registration is closed, deny access
        if (! config('bytenet.base.registration_open')) {
            abort(403, trans('bytenet-base::base.registration_closed'));
        }

        $this->validator($request->all())->validate();

        $this->guard()->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }
}
