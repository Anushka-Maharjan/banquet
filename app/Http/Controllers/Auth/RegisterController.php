<?php

namespace App\Http\Controllers\Auth;

use App\Banquet;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/calendar/1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact'=>'required',
            'banquet_name'=>'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'email' => $data['email'],
            'contact'=>$data['contact'],
            'verified'=>0,
            'role'=>'banquet',
            'password' => Hash::make($data['password']),
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $mailusers=User::where('email','=',$request->input('email'))->get();
        if (count($mailusers)==0) {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->verified = 0;
            $user->role = 'banquet';
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Mail::to($user->email)->send(
                new VerifyEmail($user)
            );

            $banquet = new Banquet();
            $banquet->name = $request->input('banquet_name');
            $banquet->user_id = $user->id;
            $banquet->save();
            return redirect('/register-success');
        }else{
            return redirect('login')->with('danger','email already exists');
        }

//        echo $user->id;
//        $this->guard()->login($user);

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
    }
}

