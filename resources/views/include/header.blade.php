<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/grid-gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/banquet-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}

    <script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <script src="{{asset('js/grid-gallery.min.js')}}"></script>
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142122266-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-142122266-1');
    </script>



</head>

<body>
<div class="upper-menu">
    <p class="col-md-6 col-md-offset-6">
        @if (\Illuminate\Support\Facades\Auth::check())
            <a href="logout">Logout</a>
        @else
            <a onclick="loginmodal()" class="border-right-white"> Login</a >
            <a style="padding-left: 1%">Register</a>
        @endif
    </p>

</div>
<div class="menu">

    <ul>
        <li></li>
    </ul>
</div>
<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog width35" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
                </div>
            </div>
            <div class="modal-body" style="height: auto">
                <div class="login-reg log" >
                    <div style="height: 2rem; padding: 0">
                        <p class="text-right"> Not a member yet? <a href="register.php">Register</a> </p>
                    </div>
                    <div class="bg-gray">
                        {!! Form::open(['action'=>'UserController@userlogin','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                            <label for="contact">Email</label>
                            <input type="email" id="contact" name="email" placeholder="Your email.." required>

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Your password.." required>

                            <input type="submit" value="Login">
                        {!! Form::close() !!}
                        <h3 class="text-center font-gray">Or</h3>
                        <a href="{{url('login/facebook')}}"><button class="loginFb"><i class="fa fa-facebook"></i> Login with Facebook</button></a>
                        <a href="{{url('login/google')}}"> <button class="loginGm"><i class="fa fa-google"></i> Login with Google</button></a>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
    function loginmodal() {
        $('#login-modal').modal({show: true});
    }
</script>


