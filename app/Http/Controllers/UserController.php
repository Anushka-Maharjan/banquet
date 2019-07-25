<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function photoregister(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'contact'=>'required'
        ]);
        $mailusers=User::where('email','=',$request->input('email'))->get();
        if (count($mailusers)==0) {

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->verified = 1;
            $user->role = 'photo';
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect('/register-success');
        }else{
            return redirect()->back()->with('danger','email already exists');
        }
    }

    public function adminlogout(){
        Auth::logout();
        return redirect(url('/login'));
    }
    public function userlogout(){
        Auth::logout();
        return back();
    }

}
