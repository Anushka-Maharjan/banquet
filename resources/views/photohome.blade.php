@include('include.header')
<div class="top-banner"  >

    <div style="display: none" id="verified" class="alert alert-success">
       You are verified. Please Login
    </div>
    <div class="photo-search-container">
        <div class="photo-search">
            <p class="photo-search-title">Find Your Photographer!!</p>
            <p>Get your photographer in a click</p>
            <input type="text" placeholder="Location" class="location">
            <select class="mantype">
                <option>Photographer</option>
                <option>Videographer</option>
                <option>Both</option>
            </select>
            <select class="event-type">
                <option>Wedding</option>
                <option>Portrait</option>
                <option>Wildlife</option>
            </select>
            <button class="photo-search-btn">Find</button>

            <button class="bePartner-btn">Be Our Partner <i class="fa fa-thumbs-up"></i> </button>

        </div>

        <div class="photographer-reg">
            <p class="photo-reg-title">Become Our Partner &</p>
            <p class="photo-reg-title"> Let The Clients Find You </p>
            {!! Form::open(['action'=>'UserController@photoregister','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @csrf
            <input type="text" placeholder="Name" class="location" name="name" required>
            <input type="text" placeholder="Contact" class="photographer-contact" name="contact" required>
            <input type="email" placeholder="Your Email" class="photographer-email" name="email" required>
            <input type="password" placeholder="Password" class="location" name="password" required>
            <input type="password" placeholder="Confirm Password" class="photographer-contact" required>

            <button class="photographer-reg-btn">Get Started</button>
            {!! Form::close() !!}
            <button class="pho-back-btn"><i class="fa fa-arrow-left"></i> Back</button>



        </div>

    </div>


</div>

<div id="aboutUs" class="section-wrapper container pho-desc" style="margin-top:30px">
    <div class="row">
        <div class= "col-md-4">
            <h3>What is photo.nepvent?</h3>
            <p>photo.nepvent is a portal that connects experienced as well as aspiring photographers with their prospective clients. We are here to create a bridge between hiring photographers and seekers.
                <a href="http://nepvent.com/portfolio" target="_blank">Portfolio Sample</a>
            </p>
        </div>
        <div class= "col-md-4">
            <h3>Benefits to photographers</h3>
            <p>We provide a separate profile page for each user which acts as their portfolio and store their works, information, and experience that may be of interest to the prospective client. Based on the queries posted by the client we then connect the photographer with the clients.</p>

        </div>
        <div class= "col-md-4">
            <h3>Benefits to users</h3>
            <p>Get easy access to a wide range of photographers with our simplified search. View their online portfolio, works, and experience to find the best man for your work.</p>
        </div>
    </div>
    <div class="row steps">
        <h3 class="text-center">Are you a photographer? Register in 3 steps</h3>
        <div style="transform:translate(-50%,0);height:2px; left:50%; border-bottom:2px solid maroon; width:300px;position:relative;top:-18px"></div>
        <div class="col-md-4">
            <button disabled>1</button>
            <h4>Register as a  partner</h4>
            <p>You can register as Limited Beta user Free of cost by clicking the <a href="https://docs.google.com/forms/d/e/1FAIpQLSc1H5Vz3lGQzkn0do62dJbWjtGm63JxixFPpitY9_GcQrG99g/viewform" target="_blank">Join Now</a> button or register as a normal user from the site itself on its launch.</p>
        </div>
        <div class="col-md-4">
            <button disabled>2</button>
            <h4>Complete your profile</h4>
            <p>Fill in the necessary details. Make sure to choose your work preference wisely to get the best deal for you. Authenticate by watermarking your photos.</p>

        </div>
        <div class="col-md-4">
            <button disabled>3</button>
            <h4>Start clicking</h4>
            <p>Once your profile is verified and live, qualified clients can reach out. Set a deal and start clicking right away.</p>
        </div>
    </div>
</div>

<script>

    if( window.location.href.indexOf('#verified')>0){
        $('#verified').show();
    }


    $(".bePartner-btn").click(function () {
        $(".photo-search").removeClass("show").addClass("hide ");
        $(".photographer-reg").addClass("anim-fade-in show ");
    }).hover(function () {
            $('.bePartner-btn',this).stop(true,true).fadeIn("fast");
            $('.fa-thumbs-up').addClass('zoom shakeIt');
        },
        function () {
            $('.bePartner-btn',this).stop(true,true).fadeOut("fast");
            $('.fa-thumbs-up').removeClass('shakeIt zoom');
        });

    $(".pho-back-btn").click(function () {
        $(".photographer-reg").removeClass("show").addClass("hide");
        $(".photo-search").addClass(" anim-fade-in show");
    }).hover(function () {
            $('.pho-back-btn',this).stop(true,true).fadeIn("fast");
            $('.fa-arrow-left').addClass('goBack');
        },
        function () {
            $('.pho-back-btn',this).stop(true,true).fadeOut("fast");
            $('.fa-arrow-left').removeClass('goBack');
        });

    $("#abt-btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#aboutUs").offset().top
        }, 1000);
    });




</script>

@include('include.footer')