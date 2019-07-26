@include('include.header')


<div class="landscape-slide">
    <div class="carousel slide" id="carousel" data-ride ="carousel">
        <div class="carousel-inner">
            <div class="item active" id ="slide0">
                <div >
                    <a href="{{asset('images/banner.jpg')}}" data-lightbox="promo"><img src="{{asset('images/banner.jpg')}}" class="img-responsive" ></a>
                </div>
            </div>

        </div>
        <div class="pg-enquire" >
            <button onclick="displaymodel('enquire')">Enquire</button>
        </div>
        <div class="profile-img-container">
            <a href="{{asset('images/dummy.png')}}" data-lightbox="profile"><img src="{{asset('images/dummy.png')}}" class="img-responsive" ></a>
        </div>
    </div>

</div>
<div class="p-detail">
    <div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">About</a></li>
            <li><a data-toggle="tab" href="#menu1">Review/rating</a></li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active" >
                <div class="row">
                    @if ($result['configured']==1)
                        <div class="col-md-3">
                            <h4>Name</h4>
                            <p >Sayal Baidya</p><br>
                            <h4>Address</h4>
                            <p >Kupondole, Kathmandu</p><br>
                        </div>
                        <div class="col-md-3">
                            <h4>Experience</h4>
                            <p >Pro ho dai</p><br>
                            <h4>Genre</h4>
                            <p>Sab kuch</p><br>
                        </div>
                        <div class="col-md-6 ">
                            <h4>Bio</h4>
                            <p class="bio">This is my bio. I am my bio. We are our bio. Loreum Ipsum is my bro.
                                This is my bio. I am my bio. We are our bio. Loreum Ipsum is my bro.
                                This is my bio. I am my bio. We are our bio. Loreum Ipsum is my bro.</p>
                            <p><b>Facebook:</b><a href="https://www.facebook.com/sayalvaidya"> https://www.facebook.com/sayalvaidya</a></p>
                            <p><b>Instagram:</b><a href="https://www.instagram.com/sayalvaidya/"> https://www.instagram.com/sayalvaidya</a></p>
                            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
                                <button style="float: right" onclick="displaymodel('edit')"><i class="fa fa-pencil-square-o" ></i> Edit Profile</button>
                            @endif
                        </div>
                    @else
                        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id()==$result['photographer']->user_id)
                            <a onclick=" displaymodel('edit')">Configure Profile</a>
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
                                    <img src="images/man.jpg" class="img-responsive" style="width:60px; height:65px;margin-top: 10px">
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
                                    <img src="images/man.jpg" class="img-responsive" style="width:60px; height:65px;margin-top: 10px">
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
<div class="container event-space ">
    <h3 class="text-center">Event Coverages</h3>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="images/banquet/banquet2.jpg" data-lightbox="gallery"><img src="images/banquet/banquet2.jpg" ><p class="text-center">Ram Sita Wedding</p></a> </div>
            <div class="swiper-slide"><a href="images/banquet/b3.jpeg" data-lightbox="gallery"><img src="images/banquet/b3.jpeg" ><p class="text-center">Ram Gita Wedding</p></a> </div>
            <div class="swiper-slide"><a href="images/banquet2.jpg" data-lightbox="gallery"><img src="images/banquet2.jpg" ><p class="text-center">Aditya Narayan Jha Farenheit</p></a> </div>
            <div class="swiper-slide"><a href="images/banquet/b1.jpeg" data-lightbox="gallery"><img src="images/banquet/b1.jpeg" ><p class="text-center">Hari Bratabandha</p></a> </div>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<!--<div class="curve-op">-->
<!---->
<!--</div>-->

<div class="container gallery-space">
    <div id="gg-screen" hidden></div>
    <h3 class="text-center">My Photo Gallery</h3>

    <div class="main">
        <div class="gg-box">
            <img src="images/banquet1.jpg">
            <img src="images/Banquethall-Banner.jpg">
            <img src="images/banquet/b1.jpeg">
            <img src="images/banquet2.jpg">
            <img src="images/banquet/b3.jpeg">
            <img src="images/banquet2.jpg">
            <img src="images/banquet1.jpg">
            <img src="images/banquet2.jpg">
            <img src="images/banquet1.jpg">
            <img src="images/banquet1.jpg">

        </div>
    </div>
</div>
<div class="container video-space">
    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role=='photo')
        <h3 class="text-center">Promo Video </h3><button onclick="editVideo()">Edit Video</button>
    @endif
    <iframe class="promo-video" src="https://www.youtube.com/embed/lx9UPNzOXg8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</div>

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
                        <form class="contact100-form validate-form" method="post" action="{{action('UserController@configure')}}">
                            @csrf
                            <input type="hidden" value="{{$result['photographer']->id}}">
                            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Name">
                                <span class="label-input100">Name *</span>
                                <input class="input100" type="text" name="name" placeholder="{{$result['photographer']->name}}">
                            </div>

                            <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Enter Address">
                                <span class="label-input100">Address</span>
                                <input class="input100" type="text" name="address" placeholder="Enter Address">
                            </div>
                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100 ">Experience</span>
                                    <div class="form-group">
                                        <input type="radio" name="experience" value="Entrant"> Entrant<br>
                                        <input type="radio" name="experience" value="Skiller"> Skilled<br>
                                        <input type="radio" name="experience" value="Progessional"> Professional
                                    </div>
                                </div>
                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100">Preferred Type</span>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="checkbox" name="vehicle1" value="Bike">Wedding<br>
                                            <input type="checkbox" name="vehicle2" value="Car">Portrait<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Product<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Wildlife<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Fineart<br>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="checkbox" name="vehicle1" value="Bike">Architectural<br>
                                            <input type="checkbox" name="vehicle2" value="Car">Travel<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Advertisement<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Sports<br>
                                            <input type="checkbox" name="vehicle3" value="Boat">Event<br>
                                        </div>
                                    </div>
                                </div>
                            {{--</div>--}}
                            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                                <span class="label-input100">Bio</span>
                                <textarea class="input100" name="bio" placeholder="Enter Your Bio"></textarea>
                            </div>
                            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                                <span class="label-input100">Bio</span>
                                <textarea class="input100" name="message" placeholder="Write your bio"></textarea>
                            </div>
                            <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Bio">
                                <span class="label-input100">Bio</span>
                                <textarea class="input100" name="message" placeholder="Write your bio"></textarea>
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

<script src="style/js/grid-gallery.min.js"></script>

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
                $('#myVideoModal').modal({show: true});
            }else {
                $('#myModal').modal({show: true});
            }
        @else
            $('#login-modal').modal({show: true});
        @endif

    }
    
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
</script>
