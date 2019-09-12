@include('include.header')
    <div style="position:relative;top:-7rem;width:100%; height:30rem;" class="mb-show">
            <img src="{{asset('images/himal.jpg')}}" class="img-responsive width100" style="height:100%">
    </div>
<div class="main-banner">

    <div class="home-search-container anim-fade-in">
        <div class="comma mb-none">
            <img src="{{asset('images/comma.png')}}" class="img-responsive">
        </div>
        <div class="comma-right mb-none">
            <img src="{{asset('images/comma-right.png')}}" class="img-responsive">
        </div>
     
        <div class="search-contains anim-fade-in">
            <div class="row mb-none">
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
                    <p class="text-left mb-show">I want</p>

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
                    <p class="text-left mb-show">for</p>

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
                    <p class="text-left mb-show">at</p>

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
            <img src="{{asset('images/icon/dart.png')}}" class="img-responsive" style="width:100%">
        </div>
        <p>
            Events play a vital role in human society. The least excuse could be found for good forms of celebrations. Events are planned acts and performances, which originates from ancient history. Events and festivals are well documented in the historical era before the fall of the Western Roman Empire (A.D 476).
        </p>
    </div>
    <div class="col-md-4">
        <h3 class="text-center">Why Nepvent?</h3>
        <div style="width:6rem;transform: translate(-50%,0); left:50%;position: relative">
            <img src="{{asset('images/icon/cartoon-1294877_1280.png')}}" class="img-responsive" style="width:100%">
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
