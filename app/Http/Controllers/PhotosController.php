<?php

namespace App\Http\Controllers;

use App\Banquet;
use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Banquet::where('user_id','=',Auth::id())->first();
        $photos=Photos::where('banquet_id','=',$id['id'])->get();
        $allphotos=array();
        foreach ($photos as $photo){
            unset($each);
            $each['id']=$photo->id;
            $each['photo']=$photo->photo;
            $each['selected']=($photo->photo==$id['banner'])?1:0;
            array_push($allphotos,$each);
        }
        return view('admin.photos.index')->with('photos',$allphotos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
//            'photos' => 'required'
        ]);
        echo "reached";
        $id=Banquet::where('user_id','=',Auth::id())->first();
        if ($request->hasFile('photos')) {
            $files = $request->file('photos');
            foreach ($files as $file){
                $filenameWithExt=$file->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$file->getClientOriginalExtension();
                $filenameToStore=$filename."_".time().".".$extension;

                $path=$file->storeAs('public/banquet/',$filenameToStore);
                $upload_file="storage/banquet/".$filenameToStore;
                $photos=new Photos();
                $photos->photo=$upload_file;
                $photos->banquet_id=$id['id'];
                $photos->save();
            }

        }
        return back()->with('success','Photo/s successfully added');
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
        $photo=Photos::where('id','=',$id)->first();
        $photo->delete();

        return back()->with('success','Photo successfully deleted');
    }

    public function selected($id){
        $photo=Photos::where('id','=',$id)->first();
//        echo $photo['photo'];
        $banquet=Banquet::where('user_id','=',Auth::id())->first();
        $banquet->user_id=Auth::id();
        $banquet->name=(Auth::user())->name;
        $banquet->banner=$photo['photo'];
        $banquet->save();

        return back()->with('success','Photo has successfully been selected as banner');
    }
}
