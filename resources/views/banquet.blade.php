@include('include.header')
<div id="innerHeader" class="inner-header">
    <div class="banquet-logo">
        <img src="{{asset($banquet['logo'])}}" >
    </div>
    <div class="inner-menu-container">
        <ul>
            <a id="ban-360-btn" href="#ban-360"> <li id="ban-360-title" class="col-md-3">360</li></a>
            <a id="banquet-info-btn" href="#banquet-info"> <li id="banquet-info-title" class="col-md-3">Information</li></a>
            <a id="booking-btn" href="#booking"><li id="booking-title" class="col-md-3">Contact</li></a>
            <a id="photo-btn" href="#photo"> <li id="photo-title" class="col-md-3">Gallery</li></a>
        </ul>
    </div>

</div>

<div id="ban-360" class="banner360">
    <img src="{{asset($banquet['banner'])}}" class="img-responsive">
    <div class="banner360-text">
        <p>{{$banquet['name']}}</p>
    </div>
    <div class="virtual-tour">
        <a href="/virtual-tour" target="_black">
            <p>360 Virtual Tour</p>
            <img src="{{asset('images/icon/360.png')}}" id="icon360"  style="width:50px; height:30px">
        </a>

    </div>
</div>

<div id="banquet-info" class="banquet-info">
    <div class="banquet-info-container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('images/icon/hall.png')}}" class="img-responsive">
                <h4>Number of Halls</h4>
                <div class="banquet-desc-sub">
                    <p>Total: </p>
                    <p class="banquet-info-txt">{{$banquet['hall']}}</p>
                </div>


            </div>
            <div class="col-md-3">
                <img src="{{asset('images/icon/capacity.png')}}" class="img-responsive">
                <h4>Hall Capacity</h4>
                <div class="banquet-desc" style="display: inline-flex">
                    @for($i=0;$i<$banquet['hall'];$i++)
                        @if ($i==$banquet['hall']-1)
                            <div class="banquet-desc-sub">
                                @else
                                    <div class="banquet-desc-sub  border-right">
                                        @endif
                                        <p>Hall {{$i+1}}: </p>
                                        <p class="banquet-info-txt">{{$capacity[$i+1]}}</p>
                                    </div>
                                    @endfor

                            </div>
                </div>
                <div class="col-md-3">
                    <img src="{{asset('images/icon/parking.png')}}" class="img-responsive">
                    <h4>Parking Capacity</h4>
                    <div class="banquet-desc" style="display: inline-flex">

                        <div class="banquet-desc-sub">
                            <p>Total: </p>
                            <p class="banquet-info-txt">{{$banquet['car']}}</p>
                        </div>
                    </div>


                </div>
                <div class="col-md-3">
                    <img src="{{asset('images/icon/Price.png')}}" class="img-responsive">
                    <h4>Pricing</h4>
                    <div class="banquet-desc">
                        <p>Starts at:</p>
                        <p class="banquet-info-txt">Rs.1200/pax</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id ="booking" class="booking-container">
        <div class="row">
            <div class="col-md-6">
                <h3 style="margin-bottom: 20px;">Contact Information</h3>
                <p><button><i class="fa fa-phone"></i></button>{{$banquet['contact']}}</p>
                <p><button><i class="fa fa-envelope"></i></button> {{$banquet['email']}}</p>
                <p><button><i class="fa fa-map-marker"></i></button> {{$banquet['address']}}</p>


            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">Book Now </h3>
                    <form class="form-horizontal choose">
                        <div class="form-group">
                            <label class="col-sm-3" for="month">Choose: </label>
                            <select class="form-control col-sm-3" id="hall" onchange="changeHall()">
                                @for($i=1;$i<=$banquet['hall'];$i++)
                                    <option value="{{$i}}">Hall {{$i}}</option>
                                @endfor
                            </select>
                            <select class="form-control col-sm-3" name="month" id="month" onchange="jump()">
                                <option value=0>Baisakh</option>
                                <option value=1>Jestha</option>
                                <option value=2>Asad</option>
                                <option value=3>Shrawan</option>
                                <option value=4>Bhadra</option>
                                <option value=5>Asoj</option>
                                <option value=6>Kartik</option>
                                <option value=7>Mangsir</option>
                                <option value=8>Poush</option>
                                <option value=9>Magh</option>
                                <option value=10>Falgun</option>
                                <option value=11>Chaitra</option>
                            </select>

                            <label for="year"></label>
                            <select class="form-control col-sm-3" name="year" id="year" onchange="jump()">
                                <option value=2076>2076</option>
                                <option value=2077>2077</option>
                                <option value=2078>2078</option>
                                <option value=2079>2079</option>
                            </select></div>
                    </form>
                    <div class="form-inline ">
                        <div class="col-md-10 col-md-offset-1">
                            <button class="btn col-sm-2  pn-btn" id="previous" onclick="previous()"><i class="fa fa-chevron-left"></i></button>
                            <h3 class="card-header col-sm-8  text-center" id="monthAndYear"></h3>
                            <input type="hidden" id="monthyear" >
                            <button class="btn col-sm-2 btn-outline-primary pn-btn" id="next" onclick="next()"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <table  id="calendar" class="width100">
                        <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                        </thead>

                        <tbody id="calendar-body">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div id="photo" class="photo-section">
        <h2 class="grs-news-title">Photo Gallery</h2>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($photos as $photo)
                    @if ($photo->photo != $banquet['banner'])
                        <div class="swiper-slide"><a href="{{asset($photo->photo)}}" data-lightbox="gallery"><img src="{{asset($photo->photo)}}" style="width:400px; height:250px;"></a> </div>
                    @endif
                @endforeach

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-11">
                        <h3>Book Banquet</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: 400px">
                <div class="row" style="width:100%;">
                    {!! Form::open(['action'=>'PagesController@book','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input class="col-md-8" type="text" name="name" placeholder="Name">
                        <input class="col-md-4" type="text" name="contact" placeholder="Contact No.">
                        <select class="col-md-4" name="shift">
                            <option value="---">---</option>
                            <option value="morning">Morning</option>
                            <option value="evening">Evening</option>
                        </select>
                        <input class="col-md-4" type="text" name="address" placeholder="Address">
                        <input class="col-md-4" type="text" name="pax" placeholder="Estimated pax">
                        <input type="hidden" id="day" name="day">
                        <input type="hidden" name="banquet" value="{{$banquet->id}}">
                        <input type="hidden" name="hall" id="selected_hall">


                        <button class="enquire-btn">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
            {{--<div class="modal-footer">--}}
                {{----}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        </div>

    </div>
</div>

@include('include.script')

<script>
    window.onscroll = function() {
        myFunction()
    };
    var header = document.getElementById("innerHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        // console.log("reached");
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    $("#booking-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#booking").offset().top
        }, 1000);
    });
    $("#ban-360-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#ban-360").offset().top
        }, 1000);
    });
    $("#banquet-info-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#banquet-info").offset().top
        }, 1000);
    });
    $("#photo-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#photo").offset().top
        }, 1000);
    });
    $("#ban-360").hover(function () {
            $(".banner360",this).stop(true,true).fadeIn("fast");
            $("#ban-360-title").addClass('red-bg');
        },
        function () {
            $('.banner360',this).stop(true,true).fadeOut("fast");
            $("#ban-360-title").removeClass('red-bg');
        }
    );

    $("#banquet-info").hover(function () {
            $(".banquet-info",this).stop(true,true).fadeIn("fast");
            $("#banquet-info-title").addClass('red-bg');
        },
        function () {
            $('banquet-info',this).stop(true,true).fadeOut("fast");
            $("#banquet-info-title").removeClass('red-bg');
        }
    );
    $("#booking").hover(function () {
            $(".booking",this).stop(true,true).fadeIn("fast");
            $("#booking-title").addClass('red-bg');
        },
        function () {
            $('.booking',this).stop(true,true).fadeOut("fast");
            $("#booking-title").removeClass('red-bg');
        }
    );
    $("#photo").hover(function () {
            $(".photo-section",this).stop(true,true).fadeIn("fast");
            $("#photo-title").addClass('red-bg');
        },
        function () {
            $('.photo-section',this).stop(true,true).fadeOut("fast");
            $("#photo-title").removeClass('red-bg');
        }
    );

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

    function displayModel(date) {
        $('#day').val(date);
        $('#selected_hall').val($( "#hall" ).val());
        $('#myModal').modal({show: true});
    }

    function displayOldModel(date) {
        alert('The booking for '+date+' is not possible now.');
    }

    $('.virtual-tour').hover(function () {
            console.log("Test");
            $(".virtual-tour", this).stop(true, true).fadeIn("fast");
            $("#icon360").addClass('icon360-rotate');
        },
        function () {
            $(".virtual-tour", this).stop(true, true).fadeOut("fast");
            $("#icon360").removeClass('icon360-rotate');
        }
    );
</script>
</body>

</html>
