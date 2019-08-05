@include('include.header')

<link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}">
<style>
    .main-banner{
        width:100%;
        height:60rem;
        position: relative;
        top:0;
        left:0;
        background-image: url("images/nepvent-home.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
    .home-search-container{
        padding:10px;
        position: relative;
        transform: translate(-50%,-50%);
        left:50%;
        top:50%;
        width:80rem;
        height:10rem;
        background: rgba(255,255,255,0.8);
        border-radius: 5px;
    }
    .text-left{
        text-align:left;
    }
    .index-search-field input{
        width:100%;
        height:4rem;
        padding-left: 10px;
        /*border-right: 3px solid lightgray;*/
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;

        outline: none;

    }
    .home-search-container .col-md-4, .home-search-container .row{
        padding: 0;
        margin:0;
    }
    .search-contains{
        width:90%;
        float: left;
        display: inline-block;
    }
    .search-contains p{
        margin-bottom: 0;
        font-family: fantasy;
        font-size: 2rem;
        color: gray;
    }
    .index-search{
        margin-top: 2.8rem;
        width:100%;
        height:4rem;
    }
    .index-search-btn{
        width:10%;
        height:100%;
        border: none;
        color:white;
        background: #2391bb;
    }
    .comma{
        position:absolute;
        left:-55px;
        width:60px;
        height:60px;
        z-index:10;
        top:-34rem;
        opacity:0.8;
    }
    .comma-right{
        position:absolute;
        right:-55px;
        width:60px;
        height:60px;
        z-index:10;
        top:-34rem;
        opacity:0.8;
    }
    /*the container must be positioned relative:*/
    .custom-select {
        width:100%;
        height:4rem;
        position: relative;
        border-right: 2px solid #f4f4f2;
        font-family: Arial;
    }

    .custom-select select {
        display: none; /*hide original SELECT element:*/
    }

    .select-selected {
        background-color: #ffffff;
    }

    /*style the arrow inside the select element:*/
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: black transparent transparent transparent;
    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent black transparent;
        top: 7px;
    }

    /*style the items (options), including the selected item:*/
    .select-items div,.select-selected {
        color: black;
        height:4rem;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        user-select: none;
    }

    /*style items (options):*/
    .select-items {
        position: absolute;
        background-color: white;
        top: 100%;
        left: 0;
        right: 0;
        height:16rem;
        overflow: auto;
        z-index: 99;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
        display: none;
    }

    .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .anim-fade-in{
        animation: fadeIn 2s 1;
    }
    @-webkit-keyframes fadeIn {
        0%{opacity:0;}
        100%{opacity: 1;}
    }
    .bounce{
        -webkit-animation: bouncer 2s ease-out;
        -moz-animation: bouncer 2000ms ease-out;
        -o-animation: bouncer 2000ms ease-out;
        animation: bouncer 2s ease-out;
        animation-delay: 2s;
    }
    @-webkit-keyframes bouncer {

        0% {
            -webkit-transform:translateY(-100%);
        }
        5% {
            -webkit-transform:translateY(-60%);
        }
        15% {
            -webkit-transform:translateY(0);
        }
        20% {
            -webkit-transform:translateY(-60%);
        }
        25% {
            -webkit-transform:translateY(0%);
        }
        30% {
            -webkit-transform:translateY(-50%);
        }
        35% {
            -webkit-transform:translateY(0%);
        }
        40% {
            -webkit-transform:translateY(-40%);
        }
        45% {
            -webkit-transform:translateY(0%);
        }
        50% {
            -webkit-transform:translateY(-30%);
        }
        55% {
            -webkit-transform:translateY(0%);
        }
        60% {
            -webkit-transform:translateY(-10%);
        }
        65% {
            -webkit-transform:translateY(0%);
        }
        70% {
            -webkit-transform:translateY(-5%);
        }
        75% {
            -webkit-transform:translateY(0);
        }
        80% {
            -webkit-transform:translateY(-1%);
        }
        85% {
            -webkit-transform:translateY(0);
        }
        90% {
            -webkit-transform:translateY(-1%);
        }
        95% {
            -webkit-transform:translateY(0);
        }
        100% {
            -webkit-transform:translateY(0);
        }
    }
    .banquet-ad{
        padding: 15px;
        position: relative;
        height:40rem;
        width:100%;
        margin: 20px 0 0 0;
        background:linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,0.7)), url('images/banquet1.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .nepvent-desc{
        min-height: auto;
        width:100%;
        margin: 50px 0 20px 0;
        padding: 0 20px 0 20px;
    }
    .nepvent-desc p{
        font-size: 16px;
        line-height: 1.7;
        text-align: center;
    }
    .nepvent-desc h3{
        font-weight: bold;
    }
    .ptr-container{
        background-color: #eaedfe;
        padding:10px;
        border: none;
        border-radius: 10px;
        width:100%;
        height:auto;
        box-shadow: 0 10px 15px rgba(0,0,0,0.4);
    }
    .ptr-container input{
        padding-left: 10px;
        width:100%;
        height:4rem;
        border: none;
        margin-bottom: 20px;

    }
    .ptr-container p{
        margin-bottom: 0;
        text-align: left;
    }
    .confirm-btn{
        margin-top: 10px;
        width:100%;
        height:5rem;
        background: #8191f1;
        color:white;
        font-weight: bold;
        /*font-size: 18px;*/
        border-radius: 3px;
    }
    .ad-slider{
        border-radius: 5px;
        padding: 15px 15px 15px 15px;
        position: absolute;
        width:60rem;
        height:30rem;
        background-color: rgba(0,0,0,0.7);
        transform: translate(-50%,-50%);
        top:50%;

    }
    .ad-right{
        left:70%;

    }
    .owl-carousel{
        height:100%;
    }
    .owl-carousel .item{
        height:100%
    }
    .owl-carousel .item img{
        height:90%;
        object-fit: cover;
    }
    .text-white{
        color:white;
    }
    .banquet-ad-txt{
        font-family: Papyrus, Herculanum, Party LET, Curlz MT, Harrington, fantasy;
        position: relative;
        float: left;
        width:40%;
        height:auto;
        font-weight: bolder;
    }
    .banquet-ad-txt p, .pho-ad-txt p{
        font-size: 18px;
    }
    .pho-ad{
        padding: 15px;
        position: relative;
        height:40rem;
        width:100%;
        margin: 0 0 20px 0;
        background:linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,0.7)), url('images/pho1.png');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .pho-ad-txt{
        font-family: Papyrus, Herculanum, Party LET, Curlz MT, Harrington, fantasy;
        position: relative;
        float: right;
        width:40%;
        height:auto;
        font-weight: bolder;
        z-index:12;
    }
    .ad-left{
        left:30%;
    }
    .border{
        z-index: 5;
        width: 100%;
        height:10rem;
        background-image: url("images/border.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        bottom:-40px;
        left:0;
        opacity:0.8;
    }

</style>
<div class="main-banner">

    <div class="home-search-container anim-fade-in">
        <div class="comma ">
            <img src="images/comma.png" class="img-responsive">
        </div>
        <div class="comma-right ">
            <img src="images/comma-right.png" class="img-responsive">
        </div>
        <div class="search-contains anim-fade-in">
            <div class="row ">
                <div class="col-md-4 ">
                    <p class="text-left">I want</p>
                </div>
                <div class="col-md-4">
                    <p class="text-left">for</p>
                </div>
                <div class="col-md-4">
                    <p class="text-left">at</p>
                </div>
            </div>
            <div class="row index-search-field">
                <div class="col-md-4">
                    <div class="custom-select" >
                        <select>
                            <option value="0">Select:</option>
                            <option value="1">Photographer</option>
                            <option value="2">Videographer</option>
                            <option value="3">Banquet</option>
                            <option value="4">Band Baja</option>
                            <option value="5">Transportation</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-select" >
                        <select>
                            <option value="0">Select:</option>
                            <option value="1">Wedding</option>
                            <option value="2">Bratabandha</option>
                            <option value="3">Get Together</option>
                            <option value="4">Photoshoot</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="text" placeholder="Location">

                </div>
            </div>
        </div>
        <div class="index-search">
            <button class="index-search-btn"><i class="fa fa-search"></i> </button>
        </div>
    </div>

</div>
<div class="container nepvent-desc">
    <div class="col-md-4">
        <h3 class="text-center">What is Nepvent</h3>
        <div style="width:6rem;transform: translate(-50%,0); left:50%;position: relative">
            <img src="images/100244_preview.png" class="img-responsive" style="width:100%">
        </div>
        <p>
            Events play a vital role in human society. The least excuse could be found for good forms of celebrations. Events are planned acts and performances, which originates from ancient history. Events and festivals are well documented in the historical era before the fall of the Western Roman Empire (A.D 476).
        </p>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">Why Nepvent?</h3>
        <div style="width:6rem;transform: translate(-50%,0); left:50%;position: relative">
            <img src="images/cartoon-1294877_1280.png" class="img-responsive" style="width:100%">
        </div>
        <p>
            Events play a vital role in human society. The least excuse could be found for good forms of celebrations. Events are planned acts and performances, which originates from ancient history. Events and festivals are well documented in the historical era before the fall of the Western Roman Empire (A.D 476). entities and to share rituals and celebrations with each other.
        </p>
    </div>
    <div class="col-md-4">
        <div class="ptr-container">
            <h1>Be<br> Our Partner</h1>
            <p>My name is</p>
            <input type="text" placeholder="Your Name">
            <p>I am/have</p>
            <div class="custom-select" >
                <select>
                    <option value="0">Select:</option>
                    <option value="1">Photographer</option>
                    <option value="2">Banquet</option>
                    <option value="3">Caterine</option>
                    <option value="4">Band Baja</option>
                </select>
            </div>
            <button class="confirm-btn">Confirm <i class="fa fa-thumbs-up"></i> </button>
        </div>
    </div>


</div>
<div class=" banquet-ad">
    <div class="banquet-ad-txt">
        <h1 class="text-white">Find your banquet</h1>
        <p class="text-white"> Browse more than 100 banquets in and around kathmandu valley.</p>
    </div>

    <div class="ad-slider ad-right">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="images/banquet2.jpg" class="img-responsive">
                <h5 class="text-center text-white">Heritage garden</h5>

            </div>
            <div class="item">
                <img src="images/banquet1.jpg" class="img-responsive">
                <h5 class="text-center text-white">Sasa</h5>

            </div>

        </div>
    </div>
    <div class="border">

    </div>
</div>

<div class="pho-ad">
    <div class="pho-ad-txt">
        <h1 class="text-white">Looking for a photographer/videographer?</h1>
        <p class="text-white"> Browse more than 100 photographers in and around kathmandu valley.</p>
    </div>

    <div class="ad-slider ad-left">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="images/banquet2.jpg" class="img-responsive">
                <h5 class="text-center text-white">Heritage garden</h5>

            </div>
            <div class="item">
                <img src="images/banquet1.jpg" class="img-responsive">
                <h5 class="text-center text-white">Sasa</h5>

            </div>

        </div>
    </div>
</div>
<script src="{{asset("js/owl.carousel.js")}}"></script>

<script>

    $(document).ready(function() {
        $('.comma').delay(1500).animate({top:'-4rem'}).addClass('bounce');
        $('.comma-right').delay(1500).animate({top:'-4rem'}).addClass('bounce');
    });
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 2,
                    nav: true,
                    loop: true,
                    margin: 20
                }
            }
        });
    });

</script>
<script>
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
             create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                 and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
             and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
         except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
     then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>

@include('include.footer')
