<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/calendar/1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(){

        return redirect(url('/admin/calendar/1'));
    }

    public function logout(){
        return redirect(url('/login'));
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginFormAdmin(){
        return view('auth.login');
    }
}
