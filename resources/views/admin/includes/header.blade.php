<html>
<head>
    <link rel="icon" href="../images/logispark.png" type="image/x-icon">
    <title>Backend</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">

    <script src="{{asset('js/nepali.datepicker.v2.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">


    <style>
        @keyframes blinkingText{
            0%{		color: #000;	}
            49%{	color: transparent;	}
            50%{	color: transparent;	}
            99%{	color:transparent;	}
            100%{	color: #000;	}
        }
    </style>

</head>

<body>

<!--<div id="wrapper">-->
<!--        Horizontal Header-->
<div class="mob-title">
    <div class="text-white homeBtn mb-top0">
        <a href ="dashboard" class="text-white" style="font-size:34px"><i class= "fa fa-home"></i></a>
    </div>
</div>
<div class="header ">

    <div class="mobile-menu menu-button" onclick="callDropDown(this.value)" value="0">
        <img id="angle-down" src="images/menu.png">
        <img id="close-icon" class="none" src="images/letter-x.png">
        <h5 class="text-white">MENU</h5>
    </div>
    <div class="text-white homeBtn mb-hide">
        <a href ="dashboard" class="text-white" style="font-size:34px"><i class= "fa fa-home"></i></a>
    </div>

    <div class="logo-box">
        <!--            <h2 class="text-white text-center">--><?php //echo $_SESSION['loggedInUser']?><!--</h2>-->
        <!--<img src="../../images/logispark_logo.png" class="logo">-->
    </div>
    <div class="dropdown user-account">
        <div class="header-sales">
        </div>
        <div class="logout">
            <?php
            //                    if ($_SESSION['expire']==0){
            //                         echo "<div class=\"expiry-alert\">
            //                        <p class=\"blink\">Your Account Will Expire in: 1 day</p>
            //                    </div>";
            //                    }else if ($_SESSION['expire']<=3){
            //                        echo "<div class=\"expiry-alert\">
            //                        <p class=\"blink\">Your Account Will Expire in: ".($_SESSION['expire']+1)." days</p>
            //                    </div>";
            //                    }
            ?>
            <a class="user-name-header" onclick="myFunction()">Profile<b class="caret"></b></a>

        </div>
        <div id="myDropdown" class="dropdown-content">
            <div class="col-md-12 pad-top no-side-pad ">
                <ul class="no-pad">
                    <!--<li class="bottom-mark"><a href="#">Change password</a></li>-->
                    <li><a href="viewProfile">View Profile</a></li>
                    <li><a href="changePassword">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!--        Header Ends here-->
<!--        Default side nav bar starts-->
<div id="sidebar-wrapper-default">
    <ul class="sidebar-nav-default">
        <li class="sub-menu" style="">
            <a href="#" class="" id="wholeseller">
                <i class="icon_desktop"></i>
                <span><i class="fa fa-truck"></i>Book Hall</span>
                <span class="fa fa-angle-down pull-right"></span>
            </a>
            <ul class="sub" id="wholeseller-list" style="list-style-type:none">
                <li><a href="Wholesale_Add"><i class="fa fa-fw fa-plus"></i> Hall 1</a></li>
                <li><a href="Wholesale_home"><i class="fa fa-list"></i>Hall 2</a></li>
            </ul>
        </li>

        {{--<li class="sub-menu" style="">--}}
            {{--<a href="#" class="" id="inventory">--}}
                {{--<i class="icon_desktop"></i>--}}
                {{--<span><i class="fa fa-database"></i>Inventory</span>--}}
                {{--<span class="fa fa-angle-down pull-right"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub" id="inventory-list" style="list-style-type:none">--}}
                {{--<li><a href="addInventory"><i class="fa fa-fw fa-plus"></i> Add to Inventory</a></li>--}}
                {{--<li><a href="inventory_land"><i class="fa fa-list"></i>List Inventory</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li  style="">--}}
            {{--<a href="#" class="" id="report">--}}
                {{--<i class="icon_desktop"></i>--}}
                {{--<span><i class="fa fa-file "></i> Report</span>--}}
                {{--<span class="fa fa-angle-down pull-right"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-report" id="report-list" style="list-style-type:none">--}}
                {{--<li><a href="profitReportLanding"><i class="fa fa-fw fa-bar-chart"style="margin-right:8%"></i> Profit</a></li>--}}
                {{--<li><a href="salesReportLanding"><i class="fa fa-fw fa-money" style="margin-right:8%"></i> Sales </a></li>--}}
                {{--<li><a href="inventoryReportLand"><i class="fa fa-fw fa-shopping-basket" style="margin-right:8%"></i> Inventory </a></li>--}}
                {{--<li><a href="import_land"><i class="fa fa-fw fa-shopping-cart" style="margin-right:8%"></i> Import </a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

        {{--<li class="sub-menu" style="">--}}
            {{--<a href="#" class="" id="online">--}}
                {{--<i class="icon_desktop"></i>--}}
                {{--<span><i class="fa fa-globe "></i> Online</span>--}}
                {{--<span class="fa fa-angle-down pull-right"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub" id="online-list" style="list-style-type:none">--}}
                {{--<li><a href="online"><i class="fa fa-fw fa-plus"></i> Add Online Order</a></li>--}}
                {{--<li><a href="viewOnline"><i class="fa fa-cube"></i>Undelivered Items </a></li>--}}
                {{--<li><a href="showDeliveredItems"><i class="fa fa-check"></i> Delivered Items </a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="sub-menu"><a href="insights"><i class="fa fa-line-chart"></i>Insights</a></li>--}}
        {{--<li class="sub-menu"><a href="billing"><i class="fa fa-pencil"></i> Daily Sales</a></li>--}}
        {{--<li class="sub-menu"><a href="revertOrder"><i class="fa fa-repeat"></i>Wholesale Return</a></li>--}}
        <li class="sub-menu"><a href="customer_info"><i class="fa fa-image"></i>Photo</a></li>
    </ul>
</div>
<!--        Default side nav bar ends here-->

<script>
    function callDropDown(val) {
        if(val == 0){
            $("#angle-down").hide();
            $("#close-icon").show();
            $(".menu-button").val(1);
            $("#sidebar-wrapper-default").show();
            document.getElementById('sidebar-wrapper-default').style.width="100%";
            if (/*@cc_on!@*/false || !!document.documentMode){
                document.getElementById('drop-down').style.display = 'block';
            }
        }else {
            $("#close-icon").hide();
            $("#angle-down").show();
            $(".menu-button").val(0);
            $("#sidebar-wrapper-default").hide();
            if (/*@cc_on!@*/false || !!document.documentMode){
                document.getElementById('drop-down').style.display = 'none';
            }
        }
    }
    $(function () {
        $('#report').click(function () {
            $('#report-list').slideToggle();
        });
        $('#online').click(function () {
            $('#online-list').slideToggle();
        });
        $('#wholeseller').click(function () {
            $('#wholeseller-list').slideToggle();
        });
        $('#inventory').click(function () {
            $('#inventory-list').slideToggle();
        });


        $('#articles').click(function () {
            $('#article-list').slideToggle();
        });

        $('#department').click(function () {
            $('#department-list').slideToggle();
        });


        $('#faculty').click(function () {
            $('#faculty-list').slideToggle();
        });

        $('#contact').click(function () {
            $('#contact-list').slideToggle();
        });

        $('#video').click(function () {
            $('#video-list').slideToggle();
        });

        $('#inquiry').click(function () {
            $('#inquiry-list').slideToggle();
        });

        $('#open-house').click(function () {
            $('#open-house-list').slideToggle();
        });

        $('#documents').click(function () {
            $('#document-list').slideToggle();
        });

        $('#customize').click(function () {
            $('#customize-list').slideToggle();
        });

    });

    //        script for logout starts

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.user-name-header')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    };

    //        script for logout ends
</script>




