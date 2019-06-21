<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device, initial-sctiale=1.0">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body >

<div class="header">
    <div class="header-logo">
        {{--<a href="dashboard.php"><img src="../lrm/images/logo.png" class="logo"></a>--}}

        <h3 class="">{{(\Illuminate\Support\Facades\Auth::user())->name}}</h3>
    </div>

    <p class="text-white welcome">Welcome</p>
        {{--echo $_SESSION['name']?></p>--}}

    <div class="logout">
        <div id="txt"></div>
        {{--<a href="change-password.php">Change Password</a>--}}
        <a href="/admin/logout">Logout</a>
</div>
<div class="sub-header">
    <ul>
        <a href="/admin/calendar/1"><li><i class="fa fa-home"></i>Booking For Hall 1</li></a>
        <a href="/admin/calendar/2"><li><i class="fa fa-home"></i>Booking For Hall 2</li></a>
        <a href="/admin/photos"><li><i class="fa fa-image"></i>Photos</li></a>
    </ul>
</div>