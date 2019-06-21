<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminverify(Request $request)
    {
        $contact=$request->contact;
        $password=$request->password;
        if(Auth::attempt(['contact'=>$contact,'password'=>$password,'verified'=>1])){
            if ((Auth::user())->logged_in==0){
                $user=User::where('id','=',Auth::id())->first();
                $user->logged_in=1;
                $user->save();
                echo "profile visti";
            }else {
                return redirect(url('admin/calendar/1'));
            }
        }
        else {

            return "Wrong Credentials";
        }
    }

    public function adminlogout(){
        Auth::logout();
        return redirect(url('/login'));
    }


}
