<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
class SocialAuthController extends Controller
{
    public function redirect($service) {
//        Session::put('url',url()->previous());
        session(['url'=>url()->previous()]);
//        Session::save();
//        echo url()->previous();
//        echo session('url');
        return Socialite::driver( $service )->redirect ();
    }

    public function callback($service) {
        $userSocial = Socialite::driver($service)->stateless()->user();
        $user=User::where('email','=',$userSocial->email)->first();
        if (count($user)==0){
            $user=new User();
            $user->name=$userSocial->name;
            $user->email=$userSocial->email;
            $user->contact=0;
            $user->verified = 1;
            $user->role = 'user';
            $user->password = Hash::make('user123');
            if ($service=='facebook'){
                $fileContents = file_get_contents($userSocial->getAvatar());
                File::put(public_path() . '\storage\profile\profile.jpg', $fileContents);
                $user->dp = public_path('\storage\profile\profile.jpg');
            }else{
                $user->dp=$userSocial->getAvatar();
            }
            $user->save();
        }
        Auth::attempt(['email'=>$userSocial->email,'password'=>'user123','verified'=>1]);
        return redirect(url('portfolio') );
    }
}
