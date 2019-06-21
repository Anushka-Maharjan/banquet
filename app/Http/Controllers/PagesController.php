<?php

namespace App\Http\Controllers;

use App\Banquet;
use App\Capacity;
use App\Count;
use App\Event;
use App\IP;
use App\Photos;
use App\UniqueView;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function banquet($username){
        if ($username=='www'){
            return view('index');
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
    }

    public function autocomplete(){
        return view('autocomplete');
    }

    public function subdomain(){
        echo "reached";
    }

    public function fetch(Request $request){
        if ($request->get('query')){
            $query=$request->get('query');
            if (strlen($query)>1) {
                $data = Banquet::where('name', 'like', "%" . $query . "%")->get();
                $output = "<ul>";
                foreach ($data as $datum) {
                    $output .= "<li>" . $datum->name . "</li>";
                }
                $output .= "</ul>";
            }else{
                $output="";
            }
            echo $output;
        }
    }
}

