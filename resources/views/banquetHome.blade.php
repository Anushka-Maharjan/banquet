@include('include.header')
<div class="slider">
    <!--
    Please note, that you can apply .m--global-blending-active to .fnc-slider
    to enable blend-mode for all background-images or apply .m--blend-bg-active
    to some specific slides (.fnc-slide). It's disabled by default in this demo,
    because it requires specific images, where more than 50% of bg is transparent or monotone
    -->
    <div class="demo-cont">
        <!-- slider start -->
        <div class="fnc-slider example-slider">
            <div class="fnc-slider__slides">
                <!-- slide start -->
                <div class="fnc-slide m--blend-green m--active-slide">
                    <div class="fnc-slide__inner">

                        <div class="fnc-slide__content">
                            <button type="button" class="fnc-slide__action-btn"  id="enquire-1">
                                Enquire
                                <span data-text="Enquire" >Enquire</span>
                            </button>
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Sasa</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Banquet</span>
                                </div>
                            </h2>

                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-dark">
                    <div class="fnc-slide__inner">

                        <div class="fnc-slide__content">
                            <button type="button" class="fnc-slide__action-btn" id="enquire-2">
                                Enquire
                                <span data-text="Enquire">Enquire</span>
                            </button>
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Nayabazar</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Multivenue</span>
                                </div>
                            </h2>

                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-red">
                    <div class="fnc-slide__inner">

                        <div class="fnc-slide__content">
                            <button type="button" class="fnc-slide__action-btn" id="enquire-3">
                                Enquire
                                <span data-text="Enquire">Enquire</span>
                            </button>
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>Kupondole</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Banquet</span>
                                </div>
                            </h2>

                        </div>
                    </div>
                </div>
                <!-- slide end -->
                <!-- slide start -->
                <div class="fnc-slide m--blend-blue">
                    <div class="fnc-slide__inner">

                        <div class="fnc-slide__content">
                            <button type="button" class="fnc-slide__action-btn" id="">
                                Enquire
                                <span data-text="Enquire">Enquire</span>
                            </button>
                            <h2 class="fnc-slide__heading">
                                <div class="fnc-slide__heading-line">
                                    <span>The</span>
                                </div>
                                <div class="fnc-slide__heading-line">
                                    <span>Heritage</span>
                                </div>
                            </h2>

                        </div>
                    </div>
                </div>
                <!-- slide end -->
            </div>
            <nav class="fnc-nav">
                <div class="fnc-nav__bgs">
                    <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
                    <div class="fnc-nav__bg m--navbg-dark"></div>
                    <div class="fnc-nav__bg m--navbg-red"></div>
                    <div class="fnc-nav__bg m--navbg-blue"></div>
                </div>
                <div class="fnc-nav__controls">
                    <button class="fnc-nav__control">
                        Name 1
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Name 2
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Name 3
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                    <button class="fnc-nav__control">
                        Name 4
                        <span class="fnc-nav__control-progress"></span>
                    </button>
                </div>
            </nav>
        </div>
        <!-- slider end -->
        <div class="demo-cont__credits">

            <div class="demo-cont__credits-close"></div>

            <h2 class="demo-cont__credits-heading">Banquet Name</h2>
            <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="demo-cont__credits-img" />
            <h3 class="demo-cont__credits-name">Location</h3>
            <a href="https://codepen.io/suez/" target="_blank" class="demo-cont__credits-link">Text here</a>
            <a href="https://twitter.com/NikolayTalanov" target="_blank" class="demo-cont__credits-link">Text here</a>
            <h2 class="demo-cont__credits-heading">Book Now</h2>
            <a href="https://dribbble.com/shots/2375246-Fashion-Butique-slider-animation" target="_blank" class="demo-cont__credits-link">Concept by Kreativa Studio</a>
            <h4 class="demo-cont__credits-blend">Visit Page</h4>
            <div class="colorful-switch">
                <input type="checkbox" class="colorful-switch__checkbox js-activate-global-blending" id="colorful-switch-cb" />
                <label class="colorful-switch__label" for="colorful-switch-cb">
                    <span class="colorful-switch__bg"></span>
                    <span class="colorful-switch__dot"></span>
                    <span class="colorful-switch__on">
          <span class="colorful-switch__on__inner"></span>
        </span>
                    <span class="colorful-switch__off"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="search-container anim-top">
    <h3 class="search-title">Looking for a Banquet? Search Here</h3>
    <div class="search-area ">
        <input class="search-field left-curve" type="text" name="banquet" id="banquet" placeholder="Search here..." >
        <button class="search-btn right-curve" onclick="redirectbanquet()" ><i class="fa fa-search"></i> </button>

    </div>
    <div class="search-area-alt">
        <input class="search-field-alt left-curve border-right" type="text" name="address" id="address" placeholder="Location...">
        <input class="search-field-alt border-left" type="number"  name="capacity" id="capacity" placeholder="Hall capacity(E.g: 500)">
        <button class="search-btn right-curve"><i class="fa fa-search"></i> </button>

    </div>
    <div class="search-bottom">
        <p onclick="switchSeatch()">I want to choose date and location <i class="fa fa-arrow-right"></i> </p>
    </div>
    <div class="search-bottom-alt">
        <p onclick="initialSearch()"><i class="fa fa-arrow-left"></i> Go back</p>
    </div>
    <div class="banquet-list">

    </div>

</div>
<div id="alt-header" class="alt-header">
    <div id="header-search" class="col-md-6 header-search">
        <input placeholder="Search Banquet..."><i class="fa fa-search"></i>
    </div>
</div>
<div class="page-container">
    <div class="col-md-2" style="height: 100vh; background-color: yellow">

    </div>
    <div class="col-md-10" style="height: 100vh;">
        <a href="/login/facebook">Login with faccebook</a>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b1.jpeg')}}" class="img-responsive">
            <h4>Indreni Banquet</h4>
            <p>Baneshwor, Kathmandu</p>
            <div class="banquet-btn-container" >
                <a href="/banquet/1"><button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button></a>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b2.jpeg')}}" class="img-responsive">
            <h4>Nayabazar Multivenue</h4>
            <p>Naya Bazar, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b3.jpg')}}" class="img-responsive">
            <h4>The Heritage</h4>
            <p>Sanepa, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b4.jpeg')}}" class="img-responsive">
            <h4>Kupondole banquet</h4>
            <p>Kupondole, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b3.jpg')}}" class="img-responsive">
            <h4>The Heritage</h4>
            <p>Sanepa, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b4.jpeg')}}" class="img-responsive">
            <h4>Kupondole banquet</h4>
            <p>Kupondole, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b2.jpeg')}}" class="img-responsive">
            <h4>Nayabazar Multivenue</h4>
            <p>Naya Bazar, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b1.jpeg')}}" class="img-responsive">
            <h4>Sasa Banquet</h4>
            <p>Teku, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b1.jpeg')}}" class="img-responsive">
            <h4>Sasa Banquet</h4>
            <p>Teku, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b2.jpeg')}}" class="img-responsive">
            <h4>Nayabazar Multivenue</h4>
            <p>Naya Bazar, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b3.jpg')}}" class="img-responsive">
            <h4>The Heritage</h4>
            <p>Sanepa, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
        <div class="col-md-3 banquet-view">
            <img src="{{asset('images/banquet/b4.jpeg')}}" class="img-responsive">
            <h4>Kupondole banquet</h4>
            <p>Kupondole, Kathmandu</p>
            <div class="banquet-btn-container" >
                <button class="banquet-view-btn">Visit<i class="fa fa-chevron-right"></i> </button>
            </div>
        </div>
    </div>

</div>
<script src="style/js/index.js"></script>
<script>
    window.onscroll = function() {
        myFunction()
    };
    var header = document.getElementById("alt-header");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            console.log("show");
            header.classList.add("sticky");
            $('#header-search').show();
            $('#alt-header').show();

        } else {
            // console.log("Dont show");
            header.classList.remove("sticky");
            $('#header-search').hide();
            $('#alt-header').hide();
        }
    }

    $(".fnc-slide__action-btn").click(function () {
        $('.search-container').hide();

    });

    $(".demo-cont__credits-close").click(function () {
        $('.search-container').show();
    });
    $('.banquet-view').hover(function () {
            $(".banquet-btn-container",this).stop(true,true).fadeIn("fast");
            $(this).toggleClass('open');
        },
        function () {
            $(".banquet-btn-container",this).stop(true,true).fadeOut("fast");
            $(this).toggleClass('open');
        }
    );
    function switchSeatch() {
        console.log("clicked");
        $('.search-area').hide();
        $('.search-area-alt').show().addClass('anim-left');
        $('.search-bottom').hide();
        $('.search-bottom-alt').show().addClass('anim-left');


    }
    function initialSearch() {
        $('.search-area-alt').hide();
        $('.search-area').show().addClass('anim-left');
        $('.search-bottom').show().addClass('anim-left');
        $('.search-bottom-alt').hide();



    }
    (function() {

        var $$ = function(selector, context) {
            var context = context || document;
            var elements = context.querySelectorAll(selector);
            return [].slice.call(elements);
        };

        function _fncSliderInit($slider, options) {
            var prefix = ".fnc-";

            var $slider = $slider;
            var $slidesCont = $slider.querySelector(prefix + "slider__slides");
            var $slides = $$(prefix + "slide", $slider);
            var $controls = $$(prefix + "nav__control", $slider);
            var $controlsBgs = $$(prefix + "nav__bg", $slider);
            var $progressAS = $$(prefix + "nav__control-progress", $slider);

            var numOfSlides = $slides.length;
            var curSlide = 1;
            var sliding = false;
            var slidingAT = +parseFloat(getComputedStyle($slidesCont)["transition-duration"]) * 1000;
            var slidingDelay = +parseFloat(getComputedStyle($slidesCont)["transition-delay"]) * 1000;

            var autoSlidingActive = false;
            var autoSlidingTO;
            var autoSlidingDelay = 5000; // default autosliding delay value
            var autoSlidingBlocked = false;

            var $activeSlide;
            var $activeControlsBg;
            var $prevControl;

            function setIDs() {
                $slides.forEach(function($slide, index) {
                    $slide.classList.add("fnc-slide-" + (index + 1));
                });

                $controls.forEach(function($control, index) {
                    $control.setAttribute("data-slide", index + 1);
                    $control.classList.add("fnc-nav__control-" + (index + 1));
                });

                $controlsBgs.forEach(function($bg, index) {
                    $bg.classList.add("fnc-nav__bg-" + (index + 1));
                });
            };

            setIDs();

            function afterSlidingHandler() {
                $slider.querySelector(".m--previous-slide").classList.remove("m--active-slide", "m--previous-slide");
                $slider.querySelector(".m--previous-nav-bg").classList.remove("m--active-nav-bg", "m--previous-nav-bg");

                $activeSlide.classList.remove("m--before-sliding");
                $activeControlsBg.classList.remove("m--nav-bg-before");
                $prevControl.classList.remove("m--prev-control");
                $prevControl.classList.add("m--reset-progress");
                var triggerLayout = $prevControl.offsetTop;
                $prevControl.classList.remove("m--reset-progress");

                sliding = false;
                var layoutTrigger = $slider.offsetTop;

                if (autoSlidingActive && !autoSlidingBlocked) {
                    setAutoslidingTO();
                }
            };

            function performSliding(slideID) {
                if (sliding) return;
                sliding = true;
                window.clearTimeout(autoSlidingTO);
                curSlide = slideID;

                $prevControl = $slider.querySelector(".m--active-control");
                $prevControl.classList.remove("m--active-control");
                $prevControl.classList.add("m--prev-control");
                $slider.querySelector(prefix + "nav__control-" + slideID).classList.add("m--active-control");

                $activeSlide = $slider.querySelector(prefix + "slide-" + slideID);
                $activeControlsBg = $slider.querySelector(prefix + "nav__bg-" + slideID);

                $slider.querySelector(".m--active-slide").classList.add("m--previous-slide");
                $slider.querySelector(".m--active-nav-bg").classList.add("m--previous-nav-bg");

                $activeSlide.classList.add("m--before-sliding");
                $activeControlsBg.classList.add("m--nav-bg-before");

                var layoutTrigger = $activeSlide.offsetTop;

                $activeSlide.classList.add("m--active-slide");
                $activeControlsBg.classList.add("m--active-nav-bg");

                setTimeout(afterSlidingHandler, slidingAT + slidingDelay);
            };



            function controlClickHandler() {
                if (sliding) return;
                if (this.classList.contains("m--active-control")) return;
                if (options.blockASafterClick) {
                    autoSlidingBlocked = true;
                    $slider.classList.add("m--autosliding-blocked");
                }

                var slideID = +this.getAttribute("data-slide");

                performSliding(slideID);
            };

            $controls.forEach(function($control) {
                $control.addEventListener("click", controlClickHandler);
            });

            function setAutoslidingTO() {
                window.clearTimeout(autoSlidingTO);
                var delay = +options.autoSlidingDelay || autoSlidingDelay;
                curSlide++;
                if (curSlide > numOfSlides) curSlide = 1;

                autoSlidingTO = setTimeout(function() {
                    performSliding(curSlide);
                }, delay);
            };

            if (options.autoSliding || +options.autoSlidingDelay > 0) {
                if (options.autoSliding === false) return;

                autoSlidingActive = true;
                setAutoslidingTO();

                $slider.classList.add("m--with-autosliding");
                var triggerLayout = $slider.offsetTop;

                var delay = +options.autoSlidingDelay || autoSlidingDelay;
                delay += slidingDelay + slidingAT;

                $progressAS.forEach(function($progress) {
                    $progress.style.transition = "transform " + (delay / 1000) + "s";
                });
            }

            $slider.querySelector(".fnc-nav__control:first-child").classList.add("m--active-control");

        };

        var fncSlider = function(sliderSelector, options) {
            var $sliders = $$(sliderSelector);

            $sliders.forEach(function($slider) {
                _fncSliderInit($slider, options);
            });
        };

        window.fncSlider = fncSlider;
    }());

    /* not part of the slider scripts */

    /* Slider initialization
     options:
     autoSliding - boolean
     autoSlidingDelay - delay in ms. If audoSliding is on and no value provided, default value is 5000
     blockASafterClick - boolean. If user clicked any sliding control, autosliding won't start again
     */
    fncSlider(".example-slider", {autoSlidingDelay: 4000});

    var $demoCont = document.querySelector(".demo-cont");

    [].slice.call(document.querySelectorAll(".fnc-slide__action-btn")).forEach(function($btn) {

        $btn.addEventListener("click", function() {
            console.log($(this).attr('id'));
            $(".demo-cont__credits-heading").text($(this).attr('id'));
            $demoCont.classList.toggle("credits-active");
        });
    });

    document.querySelector(".demo-cont__credits-close").addEventListener("click", function() {
        $demoCont.classList.remove("credits-active");
    });


    document.querySelector(".js-activate-global-blending").addEventListener("click", function() {

        document.querySelector(".example-slider").classList.toggle("m--global-blending-active");
    });

    $(document).ready(function () {
        $('#banquet').keyup(function () {
            var query=$(this).val();
            if (query !=''){
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('pages.fetch')}}",
                    method:"POST",
                    data:{query:query,_token:_token},
                    success:function (data) {
                        console.log("data::"+data);
                        // $('#banquet_list').fadeIn();
                        var div = document.getElementById('banquet_list');
                        div.innerHTML = data;
                    }
                })
            }
        });
        $('#address').keyup(function () {
            var query=$(this).val();
            if (query !=''){
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('pages.fetchaddress')}}",
                    method:"POST",
                    data:{query:query,_token:_token},
                    success:function (data) {
                        console.log("data::"+data);
                        // $('#banquet_list').fadeIn();
                        var div = document.getElementById('address_list');
                        div.innerHTML = data;
                    }
                })
            }
        });
    })

    function redirectbanquet() {
        var query=document.getElementById('banquet_name').value;
        window.location.href = '/new';
    }
</script>

</body>
</html>
