<?php

namespace App\Http\Controllers;

use App\Banquet;
use App\Capacity;
use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BanquetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    public function checkusername(Request $request){
        if($request->get('username'))
        {
            $username = $request->get('username');
            $data = Banquet::where('username', '=',$username)->count();
            if($data > 0)
            {
                echo 'not_unique';
            }
            else
            {
                echo 'unique';
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'hall'=>'required',
            'bike'=>'required',
            'car'=>'required',
            'logo'=>'required',
            'pricing'=>'required',
            'menu'=>'required',
            'banner'=>'required'
        ]);
        $banquet=Banquet::where('user_id','=',Auth::id())->first();
        $banquet->username=$request->input('username');
        $banquet->contact=$request->input('contact');
        $banquet->address=$request->input('address');
        $banquet->hall=$request->input('hall');
        $banquet->bike=$request->input('bike');
        $banquet->car=$request->input('car');
        
        if ($request->hasFile('logo')){
            $filenameWithExt=$request->file('logo')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('logo')->getClientOriginalExtension();
            $filenameToStore=$filename."_".time().".".$extension;
            $path=$request->file('logo')->storeAs('public/logo/',$filenameToStore);
            $banquet->logo="storage/logo/".$filenameToStore;
        }else{
            $banquet->logo="";
        }

        if ($request->hasFile('banner')){
            $filenameWithExt=$request->file('banner')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('banner')->getClientOriginalExtension();
            $filenameToStore=$filename."_".time().".".$extension;

            $path=$request->file('banner')->storeAs('public/banquet/',$filenameToStore);
            $banner="storage/banquet/".$filenameToStore;
        }else{
            $banner="";
        }
        $banquet->banner=$banner;
        if ($request->hasFile('pricing')){
            $filenameWithExt=$request->file('pricing')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('pricing')->getClientOriginalExtension();
            $filenameToStore=$filename."_".time().".".$extension;

            $path=$request->file('pricing')->storeAs('public/price/',$filenameToStore);
            $banquet->pricing="storage/price/".$filenameToStore;
        }else{
            $banquet->pricing="";
        }

        if ($request->hasFile('menu')){
            $filenameWithExt=$request->file('menu')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('menu')->getClientOriginalExtension();
            $filenameToStore=$filename."_".time().".".$extension;

            $path=$request->file('menu')->storeAs('public/menu/',$filenameToStore);
            $banquet->menu="storage/menu/".$filenameToStore;
        }else{
            $banquet->menu="";
        }
        $banquet->save();
        $photo=new Photos();
        $photo->banquet_id=$banquet->id;
        $photo->photo=$banner;
        $photo->save();
        $capacities=$request->input('capacities');
        for($i=0;$i<$banquet->hall;$i++){
            $capacity=new Capacity();
            $capacity->banquet_id=$banquet->id;
            $capacity->hall=$i+1;
            $capacity->capacity=$capacities[$i];
            $capacity->save();
        }

        return back()->with('success','Your profile has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
