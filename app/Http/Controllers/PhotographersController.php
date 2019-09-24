<?php

namespace App\Http\Controllers;

use App\Photographer;
use App\Photosphoto;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PhotographersController extends Controller
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
        //
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
            'name'=>'required',
            'id'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'videography'=>'required',
            'genre'=>'required',
            'bio'=>'required',
            'link'=>'required_if:videography,1',
            'experience'=>'required'
        ]);
        $photographer=Photographer::where('id','=',$request->input('id'))->first();
        $photographer->name=$request->input('name');
        $photographer->contact=$request->input('contact');
        $photographer->address=$request->input('address');
        $photographer->videography=$request->input('videography');
        $photographer->bio=$request->input('bio');
        $photographer->experience=$request->input('experience');
        $photographer->genre='';
        $i=1;
        foreach ($request->input('genre') as $genre){
            if($i==count($request->input('genre'))){
                $photographer->genre.=$genre;
            }else {
                $photographer->genre .= $genre . ',';
            }
            $i++;
        }
        if ($request->input('videography')==1){
            $link=$request->input('link');
            if (strpos($link,'watch?v=')!==false){
                $broken=explode('watch?v=',$link);
                $broken=explode('&',$broken[1]);
                $photographer->url=$broken[0];
            }else if(strpos($link,'youtu.be/')){
                $broken=explode('youtu.be/',$link);
                $photographer->url=$broken[1];
            }else{
                return back()->with('error','Your youtube link is wrong');
            }
        }
        $photographer->save();


        $user=User::where('id','=',$photographer->user_id)->first();
        $user->logged_in=1;
        $user->save();
        return back()->with('success','Your account has been configured');

    }

    public function changedp(Request $request){
        $this->validate($request,[
            'profile'=>'required',
            'id'=>'required'
        ]);
        $photographer=Photographer::where('id','=',$request->input('id'))->first();
        if ($photographer->dp!='dummy.jpg') {
            if (File::exists('storage/photo/profile/' . $photographer->dp)) {
                File::delete('storage/photo/profile/' . $photographer->dp);
                echo "delete";
            }
            if (File::exists('storage/photo/profile/thumbnail/' . $photographer->dp)) {
                File::delete('storage/photo/profile/thumbnail/' . $photographer->dp);
                echo "deleted";
            }
        }
//        for file name
        $filenameWithExt=$request->file('profile')->getClientOriginalName();
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('profile')->getClientOriginalExtension();
        $filenameToStore=$filename."_".time().".".$extension;
//        compress image
        $img = Image::make($request->file('profile'));
        $img->backup();
        $width=$img->width();
        $height=$img->height();
        $measure=($width>$height)?$width:$height;
        $scale=$measure/1500;
        $scale_thumbnail=$measure/500;
        $img->encode('jpg',60);
        $img->resize($width/$scale,$height/$scale);
        $img->save('storage/photo/profile/'.$filenameToStore);
//for thumbnail
        $img->reset();
        $img->encode('jpg',60);
        $img->resize($width/$scale_thumbnail,$height/$scale_thumbnail);
        $img->save('storage/photo/profile/thumbnail/'.$filenameToStore);

        $photographer->dp=$filenameToStore;
        $photographer->save();
        return redirect()->back()->with('success','Your DP has been changed');
    }

    public function changecover(Request $request){
        $photographer=Photographer::where('id','=',$request->input('id'))->first();
        if($request->hasFile('banner')){
            $filenameWithExt = $request->file('banner')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $filenameToStore = $filename . "_" . time() . "." . $extension;
            //        compress image
            $img = Image::make($request->file('banner'));
            $width = $img->width();
            $height = $img->height();
            $measure = ($width > $height) ? $width : $height;
            $scale = $measure / 1500;
            $img->encode('jpg', 60);
            $img->resize($width / $scale, $height / $scale);
            $img->save('storage/photo/photos/' . $filenameToStore);

            $photographer->banner=$filenameToStore;
        }else{
            $photographer->banner=$request->input('banner-option');
        }
        $photographer->save();
        return back()->with('success','Banner Successfully changed');
    }

    public function changevideo(Request $request){
        $photographer=Photographer::where('id','=',$request->input('id'))->first();
        $link=$request->input('video');
        if (strpos($link,'watch?v=')!==false){
            $broken=explode('watch?v=',$link);
            $broken=explode('&',$broken[1]);
            $photographer->url=$broken[0];
        }else if(strpos($link,'youtu.be/')){
            $broken=explode('youtu.be/',$link);
            $photographer->url=$broken[1];
        }else{
            return back()->with('error','Your youtube link is wrong');
        }
        $photographer->save();
        return back()->with('success','Your video has been updated');
    }
    public function addphotos(Request $request){
        $this->validate($request,[
            'photos'=>'required',
            'id'=>'required'
        ]);
        $count=0;
        foreach ($request->file('photos') as $photo){
            $photos=Photosphoto::where('photo_id','=',$request->input('id'))->get();
            if (count($photos)<15) {
                $photosphoto = new Photosphoto();
                $filenameWithExt = $photo->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $filenameToStore = $filename . "_" . time() . "." . $extension;
                //        compress image
                $img = Image::make($photo);
                $img->backup();
                $width = $img->width();
                $height = $img->height();
                $measure = ($width > $height) ? $width : $height;
                $scale = $measure / 1500;
                $scale_thumbnail = $height / 450;
                $img->encode('jpg', 60);
                $img->resize($width / $scale, $height / $scale);
                $img->save('storage/photo/photos/' . $filenameToStore);
//for thumbnail
                $img->reset();
                $img->encode('jpg', 60);
                $img->resize($width / $scale_thumbnail, $height / $scale_thumbnail);
                $img->save('storage/photo/photos/thumbnail/' . $filenameToStore);

                $photosphoto->photo= $filenameToStore;
                $photosphoto->photo_id= $request->input('id');
                $photosphoto->save();
            }else{
                $count++;
            }
        }
        if ($count==0) {
            $data=[
                'success'=>'Your photo/s has been added'];
            return back()->with($data);
        }else{
            $data=[
                'error'=>'The last '.$count.' photo/s could not be uploaded. Exceed maximum count of images(15)'];
            return back()->with($data);
        }
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
