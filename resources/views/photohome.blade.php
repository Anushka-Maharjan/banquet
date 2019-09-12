@include('include.header')
    <div style="position:relative;top:-6rem;width:100%; height:30rem;" class="mb-show">
            <img src="{{asset('images/CAMERA.jpg')}}" class="img-responsive width100" style="height:100%; object-fit:cover">
    </div>
<div class="top-banner"  >

    <div style="display: none" id="verified" class="alert alert-success">
       You are verified. Please Login
    </div>
    <div class="photo-search-container">
        <div class="photo-search">
            <p class="photo-search-title">Find Your Photographer!!</p>
            <p>Get your photographer in a click</p>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Location" class="location" name="address" id="address" autocomplete="off" >
                     <div id="photo-address-list" class="dropdown-container">
                
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-select lab" >
                        <select name="photographer" id="photographer">
                            <option value="0">Choose:</option>
                            <option value="1">Photographer</option>
                            <option value="2">Videographer</option>
                        </select>
                    </div>
                </div>
            </div>
       
           

            <div class="custom-select" >
                <select name="genre" id="genre">
                    <option value="opt">For:</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Portrait">Portrait</option>
                    <option value="Wildlife">Wildlife</option>
                    <option value="Product">Product</option>
                    <option value="Fineart">Fineart</option>
                    <option value="Architectural">Architectural</option>
                    <option value="Travel">Travel</option>
                    <option value="Advertisement">Advertisement</option>
                    <option value="Sports">Sports</option>
                    <option value="Events">Events</option>
                </select>
            </div>
            <button class="photo-search-btn" onclick="redirectaddress()">Find</button>

            <button class="bePartner-btn">Be Our Partner <i class="fa fa-thumbs-up"></i> </button>

        </div>

        <div class="photographer-reg">
            <p class="photo-reg-title">Become Our Partner &</p>
            <p class="photo-reg-title"> Let The Clients Find You </p>
            {!! Form::open(['action'=>'UserController@photoregister','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Name" class="location" name="name" required>
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Contact" class="photographer-contact" name="contact" required>
                </div> 
                <div class="col-md-12">
                    <input type="email" placeholder="Your Email" class="photographer-email" name="email" required>
                </div>
                <div class="col-md-6">
                    <input type="password" placeholder="Password" class="location" name="password" required>

                </div>
                <div class="col-md-6">
                    <input type="password" placeholder="Confirm Password" class="photographer-contact" required>
                </div>                
            </div>

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

    $(document).ready(function () {
        $('#address').keyup(function () {
            var query=$(this).val();
            if (query !=''){
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('pages.fetchaddressphoto')}}",
                    method:"POST",
                    data:{query:query,_token:_token},
                    success:function (data) {
                        console.log("data::"+data);
                        // $('#banquet_list').fadeIn();
                        var div = document.getElementById('photo-address-list');
                        div.innerHTML = data;
                    }
                })
            }
        });
    });
    $(document).on('click','li',function() {
        $('#address').val($(this).text());
        $('#photo-address-list').empty();
    })

    function redirectaddress(){
        var photographer=$('#photographer').children("option:selected").val();
        var address=document.getElementById('address').value;
        var genre=$("#genre").children("option:selected").val();
        if (photographer!="" && address!="" && genre!=""){
            window.location.href = '/search/'+address+'/'+photographer+'/'+genre;
        }
    }
</script>

@include('include.footer')