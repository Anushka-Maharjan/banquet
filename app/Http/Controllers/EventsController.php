<?php

namespace App\Http\Controllers;

use App\Event;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        $distinctDates=Event::select('day')->distinct()->get();
        $book=array();
        foreach ($distinctDates as $distinctDate){
            $bookings=Event::where('day','=',$distinctDate->day)->get();
            if (count($bookings)==2){
                $each['day']=$distinctDate->day;
                $each['book']=3;
                array_push($book,$each);
            }else{
                foreach ($bookings as $booking){
                    if ($booking->shift=="morning"){
                        $each['day']=$distinctDate->day;
                        $each['book']=1;
                        array_push($book,$each);
                    }else{
                        $each['day']=$distinctDate->day;
                        $each['book']=2;
                        array_push($book,$each);
                    }
                }
            }
        }
//        print_r($book);
        $data=array(
            'bookings'=>$book,
            'events'=>$events
        );

//        print_r($data);
        return view('admin.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function display($hall){

        $events=Event::all();
        $distinctDates=Event::where('banquet_id','=',Auth::id())->where('hall','=',$hall)->select('day')->distinct()->get();
        $book=array();
        foreach ($distinctDates as $distinctDate){
            $bookings=Event::where('day','=',$distinctDate->day)->get();
            if (count($bookings)==2){
                $each['day']=$distinctDate->day;
                $each['book']=3;
                array_push($book,$each);
            }else{
                foreach ($bookings as $booking){
                    if ($booking->shift=="morning"){
                        $each['day']=$distinctDate->day;
                        $each['book']=1;
                        array_push($book,$each);
                    }else{
                        $each['day']=$distinctDate->day;
                        $each['book']=2;
                        array_push($book,$each);
                    }
                }
            }
        }
        $data=array(
            'bookings'=>$book,
            'events'=>$events,
            'hall'=>$hall
        );
        return view('admin.index')->with($data);

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
            'customer_name'=>'required',
            'contact'=>'required',
            'advance'=>'numeric|nullable',
            'day'=>'required',
            'shift'=>'required'
        ]);
        $event=new Event();
        $event->customer_name=$request->input('customer_name');
        $event->contact=$request->input('contact');
        $event->address=$request->input('address');
        $event->day=$request->input('day');
        $event->shift=$request->input('shift');
        $event->expected_pax=$request->input('expected_pax');
        if ($request->input('advance')==null){
            $date = new DateTime(date("Y-m-d"));
            $date->modify('+7 day');
            $event->expire_in=$date;
        }else{
            $event->expire_in=null;
        }
        $event->hall=$request->input('hall');
        $event->banquet_id=Auth::id();
        $event->advance=$request->input('advance');
        $event->save();

        return back()->with('success','Booking successfully added');

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
        $this->validate($request,[
            'customer_name'=>'required',
            'contact'=>'required',
            'advance'=>'numeric|nullable',
            'day'=>'required',
            'shift'=>'required'
        ]);

        $event=Event::where('id','=',$id)->first();
        $expire_in=$event['expire_in'];
        $event->customer_name=$request->input('customer_name');
        $event->contact=$request->input('contact');
        $event->address=$request->input('address');
        $event->day=$request->input('day');
        $event->shift=$request->input('shift');
        $event->expected_pax=$request->input('expected_pax');
        if ($request->input('advance')==null){
            if ($expire_in==null){
                $date = new DateTime(date("Y-m-d"));
                $date->modify('+7 day');
                $event->expire_in=$date;
            }else{
                $event->expire_in=$expire_in;
            }
        }else{
            $event->expire_in=null;
        }
        $event->hall=$request->input('hall');
        $event->banquet_id=Auth::id();
        $event->advance=$request->input('advance');
        $event->save();

        return back()->with('success','News/Event successfully updated');

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
