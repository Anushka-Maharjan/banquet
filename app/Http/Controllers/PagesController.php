<?php

namespace App\Http\Controllers;

use App\Banquet;
use App\Booking;
use App\Capacity;
use App\Count;
use App\Enquiry;
use App\Event;
use App\Mail\EnquiryEmail;
use App\IP;
use App\Photographer;
use App\Photos;
use App\Photosphoto;
use App\UniqueView;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    public function enquire(Request $request){
        $query = new Enquiry();
        $query->name = $request->input('name');
        $query->contact = $request->input('contact');
        $query->address = $request->input('address');
        $query->event = $request->input('event');
        $query->duration = $request->input('duration');
        $query->time = $request->input('time');
        $query->date = $request->input('date');
        $query->photographer_id = $request->input('id');
        $query->save();

        $photographer = Photographer::where('id','=',$query->photographer_id)->first();
        Mail::to('example@example.com')->send(new EnquiryEmail($query,$photographer) );

        return back();
    }

    public function portfolio($username){
        $split = explode('-',$username);
        $id = end($split);
        $photographer = Photographer::where('id','=',$id)->first();
        $user=User::where('id','=',$photographer->user_id)->first();
        $photos=Photosphoto::where('photo_id','=',$id)->get();
        // print_r($user);
        $result=[
            'photographer'=>$photographer,
            'configured'=>$user->logged_in,
            'photos'=>$photos
        ];
        return view('portfolio')->with('result',$result);
    }

    public function banquet($username){
        if ($username=='www'){
            return view('index');
        }else if ($username=='photo'){
            // $photographers=Photographers::all();
            return view('photohome');
        }else if($username =='banquet'){
            return view('banquethome');
        }
        $banquet=Banquet::where('username','=',$username)->first();
        if ($banquet==null){
            return view('error');
        }

        $ipaddress=$_SERVER['REMOTE_ADDR'];
        $exist=IP::where('ipaddress', '=',$ipaddress)->count();
        if ($exist==0){
            $ip=new IP();
            $ip->ipaddress=$ipaddress;
            $ip->save();
        }

        date_default_timezone_set('Asia/Kathmandu');
        $date=date('Y-m-d');
        $exists=Count::where('banquet_id','=',$banquet['id'])->where('date','=',$date)->count();
        if ($exists==0) {
            $count = new Count();
            $count->count = 1;
            $count->date = $date;
            $count->banquet_id = $banquet['id'];
            $count->save();
        }else{
            $count = Count::where('date','=',$date)->where('banquet_id','=',$banquet['id'])->first();
            $count->count=$count['count']+1;
            $count->save();
        }

        $exists=UniqueView::where('banquet_id','=',$banquet['id'])->where('date','=',$date)->where('ipaddress','=',$ipaddress)->count();
        if ($exists==0) {
            $uniquecount = new UniqueView();
            $uniquecount->date=$date;
            $uniquecount->ipaddress = $ipaddress;
            $uniquecount->banquet_id = $banquet['id'];
            $uniquecount->save();
        }

        $capacities=Capacity::where('banquet_id','=',$banquet['id'])->get();
        $capacity=array();
        foreach ($capacities as $c){
            $capacity[$c->hall]=$c->capacity;
        }

        $user=User::where('id','=',$banquet['user_id'])->first();
        $banquet['email']=$user['email'];

        $photos=Photos::where('banquet_id','=',$banquet['id'])->get();
        $data=array(
            'photos'=>$photos,
            'banquet'=>$banquet,
            'capacity'=>$capacity,
            'count'=>$count->count

        );
        for($i=1;$i<=$banquet['hall'];$i++){
            $book=array();
            $distinctDates=Event::where('hall','=',$i)->select('day')->distinct()->get();
            foreach ($distinctDates as $distinctDate) {
                $bookings = Event::where('day', '=', $distinctDate->day)->where('hall','=',$i)->get();
                if (count($bookings) == 2) {
                    $each['day'] = $distinctDate->day;
                    $each['book'] = 3;
                    array_push($book, $each);
                } else {
                    foreach ($bookings as $booking) {
                        if ($booking->shift == "morning") {
                            $each['day'] = $distinctDate->day;
                            $each['book'] = 1;
                            array_push($book, $each);
                        } else {
                            $each['day'] = $distinctDate->day;
                            $each['book'] = 2;
                            array_push($book, $each);
                        }
                    }
                }
            }
            $array_name='bookings'.$i;
            $data[$array_name]=$book;
        }
        return view('banquet')->with($data);
//        for($i=1;$i<=$banquet['hall'];$i++){
//            $book=array();
//            $distinctDates=Event::where('hall','=',$i)->select('day')->distinct()->get();
//            foreach ($distinctDates as $distinctDate) {
//                $bookings = Event::where('day', '=', $distinctDate->day)->where('hall','=',$i)->get();
//                if (count($bookings) == 2) {
//                    $each['day'] = $distinctDate->day;
//                    $each['book'] = 3;
//                    array_push($book, $each);
//                } else {
//                    foreach ($bookings as $booking) {
//                        if ($booking->shift == "morning") {
//                            $each['day'] = $distinctDate->day;
//                            $each['book'] = 1;
//                            array_push($book, $each);
//                        } else {
//                            $each['day'] = $distinctDate->day;
//                            $each['book'] = 2;
//                            array_push($book, $each);
//                        }
//                    }
//                }
//            }
//            $array_name='bookings'.$i;
//            $data[$array_name]=$book;
//        }
    }
    
    public function searchphotographer($address,$photographer,$genre){
        if ($photographer==1){
        $photographers=Photographer::where('address','like','%'.$address.'%')
        ->where('genre','like','%'.$genre.'%')->paginate(15);
        }else{
            $photographers=Photographer::where('address','like','%'.$address.'%')
        ->where('genre','like','%'.$genre.'%')->where('videography','=',1)->paginate(15);
        }
        $data=[
            'photographers'=>$photographers,
            'address'=>$address,
            'genre'=>$genre,
            'photographer'=>$photographer
        ];
        return view('search-result-photo')->with($data);
    }

    public function searchbanquet($name){
        $name=str_replace("-","'",$name);
        $banquets=Banquet::where('name','like',"%".$name."%")->paginate(10);
        if (count($banquets)==0){
            $banquets=null;
        }
        $data=[
            'banquets'=>$banquets,
            'query'=>$name,
            'result'=>'banquet'
        ];
        return view('search-result')->with($data);
    }

    public function searchaddress($address,$hall){
        $threshold=100;
        $banquets=Banquet::where('address','like',"%".$address."%")->get();
        $result=array();
        if (count($banquets)==0){
            $result=null;
        }else{
            foreach ($banquets as $banquet){
                if ($banquet->username==null){
                    array_push($result,$banquet);
                }else{
                    $each=Capacity::where('banquet_id','=',$banquet->id)->whereBetween('capacity', [$hall-$threshold, $hall+$threshold])->get();
                    if (count($each)>0){
                        array_push($result,$banquet);
                    }
                }
            }
        }

        $data=[
            'banquets'=>$result,
            'address'=>$address,
            'hall'=>$hall,
            'result'=>'address'
        ];
        return view('search-result')->with($data);
    }


    public function autocomplete(){
        $values=explode(', ',"Bhakti Thapa Sadal, Baneshwor, Kathmandu");
        $contains=strpos("Bhakti Thapa Sadal",'sad');
        $data=[
            'values'=>$values,
            'contains'=>$contains
        ];
        return view('autocomplete')->with($data);
//        $str = 'This is Main String';
//        $substr = "Main";
//
//        if (strpos($str, $substr) !== false) {
//            echo 'true';
//        }
    }

   public function fetch(Request $request){
        if ($request->get('query')){
            $query=$request->get('query');
            if (strlen($query)>1) {
                $data = Banquet::where('name', 'like', "%" . $query . "%")->get();
                $output = "<ul  class=\"search-result\">";
                if (count($data)>0) {
                    $i=0;
                    foreach ($data as $datum) {
                        if ($i>9){
                            break;
                        }
                        if ($datum->username!=null){
                        $output .= "<a href=\"http://".$datum->username.".nepvent.com\"><li>" . $datum->name . "</li></a>";
                        }else{
                            // $datum->name=str_replace("'","-",$datum->name);
                            $output .= "<a href=\"/search/".str_replace("'","-",$datum->name)."\"><li>" . $datum->name . "</li></a>";
                            // $output .= "<a href=\"http://".$datum->username.".nepvent.com\"><li>" . $datum->name . "</li></a>";
                        }
                        $i++;
                    }
                }else{
                    $output .= "<li>No Result Found</li>";
                }
                $output .= "</ul>";
            }else{
                $output="";
            }
            echo $output;
        }
    }


    public function fetchaddress(Request $request){
        if ($request->get('query')){
            $query=$request->get('query');
            if (strlen($query)>1) {
                $data = Banquet::where('address', 'like', "%" . $query . "%")->select('address')->distinct()->get();
                $addresses=array();
                foreach ($data as $datum) {
                    array_push($addresses,$datum->address);
                }
                $final_values=array();
                foreach ($addresses as $address) {
                    $values=explode(', ',$address);
                    foreach ($values as $value){
                        if (strpos(strtolower($value), strtolower($query)) !== false){
                            array_push($final_values,$value);
                        }
                    }
                }
                $output = "<ul class='search-result-address'>";
                $final_values=array_unique($final_values);
                sort($final_values);
                $i=0;
                foreach ($final_values as $final_value) {
                    if ($i>=10){
                        break;
                    }
                    $output .= "<li>" . $final_value . "</li>";
                    $i++;

                }
                $output .= "</ul>";
            }else{
                $output="";
            }
            echo $output;
        }
    }

    public function fetchaddressphoto(Request $request){
        if ($request->get('query')){
            $query=$request->get('query');
            if (strlen($query)>1) {
                $data = Photographer::where('address', 'like', "%" . $query . "%")->select('address')->distinct()->get();
                $addresses=array();
                foreach ($data as $datum) {
                    array_push($addresses,$datum->address);
                }
                $final_values=array();
                foreach ($addresses as $address) {
                    $values=explode(', ',$address);
                    foreach ($values as $value){
                        if (strpos(strtolower($value), strtolower($query)) !== false){
                            array_push($final_values,$value);
                        }
                    }
                }
                $output = "<ul class='search-result-address-photo'>";
                $final_values=array_unique($final_values);
                sort($final_values);
                $i=0;
                foreach ($final_values as $final_value) {
                    if ($i>=10){
                        break;
                    }
                    $output .= "<li>" . $final_value . "</li>";
                    $i++;

                }
                $output .= "</ul>";
            }else{
                $output="";
            }
            echo $output;
        }
    }

    public function book(Request $request){
//        echo "reached";
        $this->validate($request,[
            'name'=>'required',
            'shift'=>'not_regex:/-/',
            'contact'=>'required',
        ],
            ['not_regex'=>'The :attribute field cannot be empty']);
        $book=new Booking();
        $book->name=$request->input('name');
        $book->shift=$request->input('shift');
        $book->hall=$request->input('hall');
        $book->date=$request->input('day');
        $book->contact=$request->input('contact');
        $book->address=$request->input('address');
        $book->banquet=$request->input('banquet');
        $book->expected_pax=$request->input('expected_pax');
        $book->save();



    }

}

