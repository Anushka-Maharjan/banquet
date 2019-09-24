@include('include.header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">



<div class="landscape-slide">
    <div class="carousel slide" id="carousel" data-ride ="carousel">
        <div class="carousel-inner">
            <div class="item active" id ="slide0">
                <div >
                    <a href="{{asset('storage\photo\photos\\'.$result['photographer']->banner)}}" data-lightbox="promo"><img src="{{asset('storage\photo\photos\\'.$result['photographer']->banner)}}" class="img-responsive" ></a>
                </div>
            </div>
            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
                <a onclick="displaymodel('bannerupdate')"><div class="edit-cover" id="edit-cover">
                    <div class="cov" >
                        <img src="{{asset('images/icon/cam.png')}}" class="img-responsive cp">
                            <p class="cp-txt">Update Banner</p>
                    </div>
                </div>
                </a>
            @endif
        </div>
        <div class="pg-enquire" >
            <button onclick="displaymodel('enquire')">Enquire</button>
        </div>
        <div class="profile-img-container">
            <a href="{{asset('storage\photo\profile\\'.$result['photographer']->dp)}}" data-lightbox="profile"><img src="{{asset('storage\photo\profile\thumbnail\\'.$result['photographer']->dp)}}" class="img-responsive pp" ></a>
            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
                <div class="edit-pp" id="edit-pp">
                    <img src="{{asset('images/icon/cam.png')}}" class="img-responsive upl-icon">
                </div>
                {!! Form::open(['action'=>'PhotographersController@changedp','method'=>'POST','class'=>'form-horizontal','id'=>'edit-pp','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="file" name="profile" onchange="form.submit()" id="profile" style="display: none" /><span id="spnFilePath"></span>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                {!! Form::close() !!}
            @endif
        </div>
    </div>

</div>
<div class="p-detail">
    <div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">About</a></li>
            <!--<li><a data-toggle="tab" href="#menu1">Review/rating</a></li>-->

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active" >
            @if(isset($success))
                <div class="alert alert-success">
                    {{$success}}
                </div>
            @endif
            
            @if(isset($error))
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endif

                <div class="row">
                        <div class="col-md-3">
                            <h4>Name</h4>
                            <p>{{$result['photographer']->name}}</p><br>
                            @if ($result['configured']==1)
                            <h4>Address</h4>
                            <p>{{$result['photographer']->address}}</p><br>
                            @endif
                        </div>
                    @if ($result['configured']==1)
                        <div class="col-md-3">
                            <h4>Experience</h4>
                            <p>{{$result['photographer']->experience}}</p><br>
                            <h4>Genre</h4>
                            <?php $genre=explode(',',$result['photographer']->genre)?>
                            <p>
                            @foreach($genre as $value)
                                @if($value==end($genre))
                                        {{$value}}
                                @else
                                    {{$value}},
                                    @endif
                            @endforeach
                            </p><br>
                        </div>
                        <div class="col-md-6 ">
                            <h4>Bio</h4>
                            <p class="bio">{{$result['photographer']->bio}}</p>
                            {{--<p><b>Facebook:</b><a href="https://www.facebook.com/sayalvaidya"> https://www.facebook.com/sayalvaidya</a></p>--}}
                            {{--<p><b>Instagram:</b><a href="https://www.instagram.com/sayalvaidya/"> https://www.instagram.com/sayalvaidya</a></p>--}}
                            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
                                <button style="float: right;" onclick="displaymodel('edit')"><i class="fa fa-pencil-square-o" ></i> Edit Profile</button>
                            @endif
                        </div>
                    @else
                        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id()==$result['photographer']->user_id)
                            <a onclick=" displaymodel('login')">Configure Profile</a>
                        @endif
                    @endif
                </div>

            </div>
            <div id="menu1" class="tab-pane fade">

                <div class="row ">
                    <div class="col-md-4 " style="border-right: 1px solid #cecece; padding:20px">
                        <h4>My Rating</h4>
                        <div class="ratings">
                            <div class="empty-stars"></div>
                            <div class="full-stars" style="width:70%">
                            </div>
                        </div> <b style="color:gray;font-size: 2rem;position: relative; left:10px; top:5px">4.5/5</b>
                        <br><h4>Rate Me Here</h4>
                        <h5>Punctuality</h5>
                        <i id="pstar-1" class="fa fa-star punc"></i>
                        <i id="pstar-2" class="fa fa-star punc"></i>
                        <i id="pstar-3" class="fa fa-star punc"></i>
                        <i id="pstar-4" class="fa fa-star punc"></i>
                        <i id="pstar-5" class="fa fa-star punc"></i>

                        <h5>Quality</h5>
                        <i id="qstar-1" class="fa fa-star qua"></i>
                        <i id="qstar-2" class="fa fa-star qua"></i>
                        <i id="qstar-3" class="fa fa-star qua"></i>
                        <i id="qstar-4" class="fa fa-star qua"></i>
                        <i id="qstar-5" class="fa fa-star qua"></i>

                        <h5>Delivery</h5>
                        <i id="dstar-1" class="fa fa-star del"></i>
                        <i id="dstar-2" class="fa fa-star del"></i>
                        <i id="dstar-3" class="fa fa-star del"></i>
                        <i id="dstar-4" class="fa fa-star del"></i>
                        <i id="dstar-5" class="fa fa-star del"></i>
                    </div>
                    <div class="col-md-8">
                        <h4>Reviews</h4>
                        <div class="review-section">
                            <div class="row" style="border-bottom: 1px solid #c8c8c8; padding:5px">
                                <div class="col-md-2">
                                    {{--<img src="images/man.jpg" class="img-responsive" style="width:60px; height:65px;margin-top: 10px">--}}
                                </div>
                                <div class="col-md-10">
                                    <div style="position: relative;display: inline-flex;width:100%">
                                        <h5 style="margin-bottom:0;width:20%">Sayal Baidya</h5>
                                        <div class="ratings" style="top:6px">
                                            <div class="empty-stars-usr"></div>
                                            <div class="full-stars-usr" style="width:70%">
                                            </div>
                                        </div>
                                        <p style="position: relative;top:8px; left:10px; color:#c9c9c9">4.5</p>
                                    </div>
                                    <p style="color:lightgray;font-size:10px; margin:0;padding:0;font-style: italic">2019 July 19</p>
                                    <p>This is my comment. My comment for you is this. This happens to be my comment. Lorem ipsum is my comment</p>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #c8c8c8; padding:5px">
                                <div class="col-md-2">
                                    {{--<img src="images/man.jpg" class="img-responsive" style="width:60px; height:65px;margin-top: 10px">--}}
                                </div>
                                <div class="col-md-10">
                                    <div style="position: relative;display: inline-flex;width:100%">
                                        <h5 style="margin-bottom:0;width:20%">Sayal Baidya</h5>
                                        <div class="ratings" style="top:6px">
                                            <div class="empty-stars-usr"></div>
                                            <div class="full-stars-usr" style="width:70%">
                                            </div>
                                        </div>
                                        <p style="position: relative;top:8px; left:10px; color:#c9c9c9">4.5</p>
                                    </div>                                <p style="color:lightgray;font-size:10px; margin:0;padding:0;font-style: italic">2019 July 19</p>
                                    <p>This is my comment. My comment for you is this. This happens to be my comment. Lorem ipsum is my comment</p>
                                </div>
                            </div>
                        </div>
                        <div style="width:100%;height:20px">
                            <button style="float: right;outline: none; border: none; background: transparent; color:maroon">View More <i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="col-md-10" style="float: right">
                            <textarea  placeholder="Drop Your Comments Here" style="    width: 100%;margin-top: 5px;height: 10rem;padding: 5px;outline: none;border: 1px solid lightgray;"></textarea>
                            <button style="float: right;outline: none; border: none; background: maroon; color:white;padding: 10px">Post</button>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--    <div class="curve">-->
    <!---->
    <!--    </div>-->

</div>
@if (count($result['photos'])>0 || ((\Illuminate\Support\Facades\Auth::check()) && (\Illuminate\Support\Facades\Auth::user()->role=='photo')))
<div class="container gallery-space">
    <div id="gg-screen" hidden></div>
    <h3 class="text-center">Photo Gallery</h3>

    <div class="main">
        <div class="gg-box">
            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
            <img style="object-fit: contain" id="add_image" src="{{asset('images/upload.png')}}">
            @endif
            @foreach($result['photos'] as $photo)
                    <img class="opn" id="{{$photo->photo}}" src="{{asset('storage\photo\photos\thumbnail\\'.$photo->photo)}}">
            @endforeach
                @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
                {!! Form::open(['action'=>'PhotographersController@addphotos','method'=>'POST','class'=>'form-horizontal','id'=>'photoform','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="file" name="photos[]" onchange="form.submit()" id="photos" style="display: none" multiple /><span id="spnFilePath"></span>
                    </div>
                </div>
                    <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                    {!! Form::close() !!}
                    @endif
        </div>
    </div>
</div>
@endif
<script src="{{asset('js/grid-gallery.min.js')}}"></script>

@if($result['photographer']->videography==1)
<div class="container video-space">
    <h3 class="text-center">Promo Video </h3>
    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
        <button style="float: right" onclick="displaymodel('video')"><i class="fa fa-refresh"></i> Change Video</button>
    @endif
    <iframe class="promo-video" src="https://www.youtube.com/embed/{{$result['photographer']->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endif

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog width70" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>Configure Profile</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                <div class="container-contact100">
                    <div class="wrap-contact100">
                        {!! Form::open(['action'=>'PhotographersController@store','method'=>'POST','class'=>'contact100-form validate-form','enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Name *</span>
                                <input class="input100" type="text" name="name" placeholder="Enter Name" value="{{$result['photographer']->name}}">
                            </div>
                            <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Address">
                                <span class="label-input100">Address</span>
                                <input class="input100" type="text" name="address" placeholder="Enter Address">
                            </div>
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Contact *</span>
                                <input class="input100" type="text" name="contact" placeholder="Enter Contact" value="{{$result['photographer']->contact}}">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100">
                                <div >
                                    <span class="label-input100 ">Do you offer Videography?</span>
                                    <div class="form-group" id="videography-div-config">
                                        <input type="radio" name="videography" class="videography-config" value="1" @if ($result['photographer']->videography==1) checked @endif> Yes
                                        <input type="radio" name="videography" class="videography-config" value="0" @if ($result['photographer']->videography==0) checked @endif> No
                                    </div>
                                </div>
                                <div id="video-div-config">

                                </div>
                            </div>
                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100 ">Experience</span>
                                    <div class="form-group">
                                        <input type="radio" name="experience" value="Entrant"> Entrant<br>
                                        <input type="radio" name="experience" value="Skilled"> Skilled<br>
                                        <input type="radio" name="experience" value="Professional"> Professional
                                    </div>
                                </div>
                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100">Preferred Type</span>
                                    <div class="form-group">
                                         @php $categories=array('Wedding','Portrait','Product','Wildlife','Fineart','Architectural','Travel','Advertisement','Sports','Event'); 
                                        $i=0 @endphp
                                        <div class="col-sm-6">
                                        @foreach ($categories as $category)
                                            <input type="checkbox" name="genre[]" value="{{$category}}">{{$category}}<br>
                                            @if ($i==4)
                                            </div>
                                            <div class="col-sm-6">
                                            @endif
                                            @php $i++ @endphp
                                        @endforeach
                                    </div>
                                    </div>
                                </div>
                            {{--</div>--}}

                            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                                <span class="label-input100">Bio</span>
                                <textarea class="input100" name="bio" placeholder="Enter Your Bio"></textarea>
                            </div>

                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="editProfile" role="dialog">
    <div class="modal-dialog width70" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                <div class="container-contact100">
                    <div class="wrap-contact100">
                        <form class="contact100-form validate-form" method="post" action="{{action('PhotographersController@store')}}">
                            @csrf
                            <input type="hidden" value="{{$result['photographer']->id}}">
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Name *</span>
                                <input class="input100" type="text" name="name" placeholder="Enter Name" value="{{$result['photographer']->name}}">
                            </div>
                            <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Address" >
                                <span class="label-input100">Address</span>
                                <input class="input100" type="text" name="address" placeholder="Enter Address" value="{{$result['photographer']->address}}">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100">
                                <span class="label-input100 ">Experience</span>
                                <div class="form-group">
                                    <input type="radio" name="experience" value="Entrant" @if ($result['photographer']->experience=="Extrant") checked @endif> Entrant<br>
                                    <input type="radio" name="experience" value="Skilled" @if ($result['photographer']->experience=="Skilled") checked @endif> Skilled<br>
                                    <input type="radio" name="experience" value="Professional" @if ($result['photographer']->experience=="Professional") checked @endif> Professional
                                </div>
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100">
                                <span class="label-input100">Preferred Type</span>
                                <div class="form-group">
                                    @php $categories=array('Wedding','Portrait','Product','Wildlife','Fineart','Architectural','Travel','Advertisement','Sports','Event'); 
                                    $i=0;
                                    $existing_categories=explode(',',$result['photographer']->genre)@endphp
                                    <div class="col-sm-6">
                                        @foreach ($categories as $category)
                                        
                                            <input type="checkbox" name="genre[]" value="{{$category}}" @if (in_array($category,$existing_categories)) checked @endif>{{$category}}<br>
                                            @if ($i==4)
                                            </div>
                                            <div class="col-sm-6">
                                            @endif
                                            @php $i++ @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Contact *</span>
                                <input class="input100" type="text" name="contact" placeholder="Enter Contact" value="{{$result['photographer']->contact}}">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100">
                                <div >
                                    <span class="label-input100 ">Do you offer Videography?</span>
                                    <div class="form-group" id="videography-div-edit">
                                        <input type="radio" name="videography" class="videography-edit" value="1" @if ($result['photographer']->videography==1) checked @endif> Yes
                                        <input type="radio" name="videography" class="videography-edit" value="0" @if ($result['photographer']->videography==0) checked @endif> No
                                    </div>
                                </div>
                                <div id="video-div-edit">
                                    @if($result['photographer']->videography==1)
                                        <span class="label-input100">Link to Video(youtube)*</span>
                                        <input class="input100" type="text" name="link" placeholder="Enter Link" value="https://www.youtube.com/watch?v={{$result['photographer']->url}}">
                                    @endif
                                </div>
                            </div>
                            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                                <span class="label-input100">Bio</span>
                                <textarea class="input100" name="bio" placeholder="Enter Your Bio">{{$result['photographer']->bio}}</textarea>
                            </div>

                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myEnquiryModal" role="dialog">
    <div class="modal-dialog width70" >

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>Enquire</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                <div class="container-contact100">
                    <div class="wrap-contact100">
                        <form class="contact100-form validate-form" action="{{action('PagesController@enquire')}}" method="post">
                            @csrf
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Name</span>
                                <input class="input100" type="text" name="name" placeholder="Enter Your Name ">
                            </div>

                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Address">
                                <span class="label-input100">Address</span>
                                <input class="input100" type="text" name="address" placeholder="Enter Address">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Contact Number">
                                <span class="label-input100">Contact Number</span>
                                <input class="input100" type="text" name="contact" placeholder="Enter Contact Number">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Event">
                                <span class="label-input100">Event</span>
                                <input class="input100" type="text" name="event" placeholder="Enter Event">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100" >
                                <span class="label-input100">Date</span>
                                <input class="input100" type="date" name="date">
                            </div>
                            <div class="wrap-input100 bg1 rs1-wrap-input100">
                                <span class="label-input100 ">Duration</span>
                                <div class="form-group">
                                    <input type="radio" name="duration" value="allDay"> All Day
                                    <input type="radio" name="duration" value="Hourly" style="margin-left: 20%"> Hourly
                                    <div id="time" style="display: none">
                                        <input type="time" name="start_time">
                                        <label style="margin:0 5% 0 5%">to</label>
                                        <input type="time" name="end_time">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="1">
                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="edivideo" role="dialog">
    <div class="modal-dialog " >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>Update Video</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                <div class="container-contact100">
                    <div class="wrap-contact100">
                        {!! Form::open(['action'=>'PhotographersController@changevideo','method'=>'POST','class'=>'contact100-form validate-form','enctype'=>'multipart/form-data']) !!}
                        @csrf
                        <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                        <div class="wrap-input100 validate-input bg1" data-validate = "Enter Your Name">
                            <span class="label-input100">Video Url (Youtube) *</span>
                            <input class="input100" type="video" name="video" placeholder="Enter URL" value="https://www.youtube.com/watch?v={{$result["photographer"]->url}}">
                        </div>
                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn">
                            <span>
                                Submit
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="bannerupdate" role="dialog">
    <div class="modal-dialog width70" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Update Banner</h3>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="close cl-ed" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                @include('admin.includes.messages')
                <div class="" style="border: 1px solid lightgray; padding: 10px; box-shadow: 0 10px 15px rgba(0,0,0,0.6)">
                    {!! Form::open(['action'=>'PhotographersController@changecover','method'=>'POST','class'=>'form-horizontal height100percent','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="id" value="{{$result['photographer']->id}}">
                    <div class="upl-new-container">
                        <div class="upl-innner">
                            <input type="file" name="banner" onchange="addclearfile()" style="width:100%;height:100%">
                           <div id="clear-file">

                           </div>
                        </div>
                    </div>
                    <div class="existing-container">
                        <h3>Choose existing image:</h3>
                        <div class="exsisting-opt">
                            @foreach($result['photos'] as $photo)
                                <label>
                                    <input type="radio" name="banner-option" value="{{$photo->photo}}">
                                    <img src="{{asset('storage\photo\photos\thumbnail\\'.$photo->photo)}}">
                                </label>
                            @endforeach
                        </div>
                        <input type="submit" onclick="return checkform()" class="btn btn-success width100" name="submit-banner" value="Submit" >
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    function displaymodel(type) {
        $('body').css("overflow",'hidden');
        @if (\Illuminate\Support\Facades\Auth::check())
            if (type == 'enquire'){
                @if(\Illuminate\Support\Facades\Auth::user()->role=='user')
                    $('#myEnquiryModal').modal({show:true});
                @else
                   $('#login-modal').modal({show: true});
                @endif
            }else if (type =='video') {
                $('#edivideo').modal({show: true});
            }else if (type=='login') {
                $('#myModal').modal({show: true});
            }else if (type=='bannerupdate') {
                $('#bannerupdate').modal({show: true});
            }else{
                $('#editProfile').modal({show: true});
            }
        @else
            $('#login-modal').modal({show: true});
        @endif

    }
    var wrapper1=$('#video-div-edit');
    $('#videography-div-edit').change(
        function (e) {
            radioValue = $("input[class='videography-edit']:checked").val();
            if (radioValue=="1"){
                $(wrapper1).empty();
                $(wrapper1).append(
                    '<span class="label-input100">Link to Video(youtube)*</span>\n' +
                    '<input class="input100" type="text" name="link" placeholder="Enter Link"  value="https://www.youtube.com/watch?v={{$result["photographer"]->url}}">'
                )
            }else{
                $(wrapper1).empty();
            }
        }
    );
    var wrapper2=$('#video-div-config');
    $('#videography-div-config').change(
        function (e) {
            radioValue = $("input[class='videography-config']:checked").val();
            if (radioValue=="1"){
                $(wrapper2).empty();
                $(wrapper2).append(
                    '<span class="label-input100">Link to Video(youtube)*</span>\n' +
                    '<input class="input100" type="text" name="link" placeholder="Enter Link">'
                )
            }else{
                $(wrapper2).empty();
            }
        }
    );

    function checkform() {
        var value=$("input[name='banner-option']:checked").val();
        if (value!=null && $('input[name=banner]').val()!=""){
            alert('cannot select both');
            return false;
        }else if(value==null && $('input[name=banner]').val()==""){
            alert('must select one');
            return false;
        }
        return true
    }
    //uncheck radio button on banner update in click
    $('input[name=banner-option]').click(function(){
        if (this.previous) {
            this.checked = false;
        }
        this.previous = this.checked;
    });

    function displayDivs() {
        $('body').css("overflow",'auto');
    }

    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true,
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });

    $('.punc').click(function () {
        var pstarId = event.target.id;
        var pposition = pstarId.split('-');
        var pnum = parseInt(pposition[1]);
        if($(this).hasClass("checked")){
            for(i=pnum+1; i<=5;i++){
                $('#pstar-'+i).removeClass("checked");
            }
        }
        else{
            for(i=1; i<=pnum;i++){
                $('#pstar-'+i).addClass("checked");
            }
        }
    });

    function addclearfile() {
        console.log('clear file');
        $('#clear-file').empty();
        $('#clear-file').append('<p onclick="clearfile()" style="position:absolute;right:15px;top:10px">Clear File</p>');
    }
    
    function clearfile() {
        $('input[name=banner]').val('');
        $('#clear-file').empty();
    }

    $('.qua').click(function () {
        var qstarId = event.target.id;
        var qposition = qstarId.split('-');
        var qnum = parseInt(qposition[1]);
        var i=1;
        if($(this).hasClass("checked")){
            for(i=qnum+1; i<=5;i++){
                $('#qstar-'+i).removeClass("checked");
            }
        }
        else{
            for(i=1; i<=qnum;i++){
                $('#qstar-'+i).addClass("checked");
            }
        }
    });

    $('.del').click(function () {
        var dstarId = event.target.id;
        var dposition = dstarId.split('-');
        var dnum = parseInt(dposition[1]);
        var i=1;
        if($(this).hasClass("checked")){
            for(i=dnum+1; i<=5;i++){
                $('#dstar-'+i).removeClass("checked");
            }
        }
        else{
            for(i=1; i<=dnum;i++){
                $('#dstar-'+i).addClass("checked");
            }
        }
    });
    $(document).ready(function(){
        $('input[type="radio"]').change(function(){
            if($(this).val() == 'Hourly'){
               $('#time').show('slow') ;
            }else {
                $('#time').hide('slow');
            }
        });
    });

    $('.profile-img-container').hover(
        function () {
            $('.edit-pp',this).stop(true,true).fadeIn("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.edit-pp',this).stop(true,true).fadeOut("fast");
            $(this).toggleClass('open');
        }
    );

    $("#add_image").click(function () {
        $("#photos").click();
    });

    $("#edit-pp").click(function () {
        $("#profile").click();
    });

    $('.carousel-inner').hover(
        function () {
            $('.edit-cover',this).stop(true,true).fadeIn("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.edit-cover',this).stop(true,true).fadeOut("fast");
            $(this).toggleClass('open');
        }
    );

</script>
@include('include.footer')