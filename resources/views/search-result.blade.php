@include('include.header')

<div  class="container" style="background: linear-gradient(#2d7c9a, transparent); padding-top: 5rem; width: 100%; margin:0">
    <div class="result">
        <div class="search-area">
                {{csrf_field()}}

            @if ($result=='banquet')
                <input class="search-field left-curve" type="text" autocomplete="off" name="banquet_name" id="banquet_name" placeholder="Search here..." value="{{$query}}">
            @else
                <input class="search-field left-curve" type="text" autocomplete="off" name="banquet_name" id="banquet_name" placeholder="Search here..." >
            @endif
            <button class="search-btn right-curve" onclick="redirectbanquet()"><i class="fa fa-search"></i> </button>

        </div>
        <div class="search-area-alt">
            @if ($result=='address')
                <input autocomplete="off" class="search-field-alt left-curve border-right" type="text" name="address" id="address" placeholder="Location..." value="{{$address}}">
                <input autocomplete="off" class="search-field-alt border-left" type="number"  name="capacity" id="capacity" placeholder="Hall capacity(E.g: 500)" value="{{$hall}}">            
            @else
                <input autocomplete="off" class="search-field-alt left-curve border-right" type="text" name="address" id="address" placeholder="Location...">
                <input autocomplete="off" class="search-field-alt border-left" type="number"  name="capacity" id="capacity" placeholder="Hall capacity(E.g: 500)">            
            @endif
            <button class="search-btn right-curve" onclick="redirectaddress()"><i class="fa fa-search"></i> </button>
        </div>
        <div class="search-bottom">
            <button onclick="switchSeatch()" ><img src="{{asset('images/icon/filter.png')}}" style="width:3rem; display:inline-block" class="img-responsive"><p style="width:6rem;font-size:1.5rem;display:inline-block">Filter</p> </button>
            
        </div>

        <div class="search-bottom-alt">
            <p onclick="initialSearch()"><i class="fa fa-arrow-left"></i> Go back</p>
        </div>
         <div id="banquet_list">
            
        </div>
        <div id="address_list">
            
        </div>

    </div>
</div>
<div class="container result-container">
    @if($banquets==null)
        <div class="row">
            <div class="col-md-4">
                <!--<img src="{{asset('images/icon/glass-search.png')}}" class="img-responsive" style="height:10rem; position: relative; transform: translate(-50%,0);left:50%" >-->
                <!--<img src="{{asset('images/icon/glass-search.png')}}" class="img-responsive">-->
            </div>
            <div class="col-md-8">
                <h4 class="">Opps! We couldn't find any result for your search:</h4>
                 @if ($result=='banquet')
                    <h3>Banquet: <b>{{$query}}</b></h3>
                @else
                    <h3>Address: <b>{{$address}}</b> & Hall Capacity: <b>{{$hall}}</b></h3>
                @endif
                
            </div>
        </div>
    @else
        @if ($result=='banquet')
            <h3 class="text-center">Showing Result for banquet: {{$query}}</h3>
        @else
            <h3 class="text-center">Showing Result for address: {{$address}} and hall capacity:{{$hall}}</h3>
        @endif
        <div class=" showing-result" style=" padding-left:20%; padding-right:20%; padding-top:5%">
           @foreach ($banquets as $banquet)
             <div class="row r1">
                <div class="col-md-3">
                    <img src="{{asset($banquet->banner)}}" class="img-responsive">
                </div>
                <div class="col-md-9">
                    <h4>{{$banquet->name}}</h4>
                    <div style="display: inline-flex">
                        <p><i class="fa fa-map-marker"></i>{{$banquet->address}}</p>
                        <p><i class="fa fa-phone"></i> {{$banquet->contact}}</p>
                        @if ($banquet->email!=null)
                            <p><i class="fa fa-envelope"></i>{{$banquet->email}}</p>
                        @endif
                        @if ($banquet->username!=null)
                            <a href="http://{{$banquet->username}}.nepvent.com"><button class="service-enquiry-btn">Visit <i class="fa fa-chevron-right"></i></button></a>
                        @endif
                    </div>
    
                </div> 
            </div>
           @endforeach
        </div>
        <div class="text-center">{{$banquets->links()}}</div>
    @endif
</div>


<script>
    @if($result=='address')
        $(' .search-area').hide();
        $('.search-area-alt').show();
        $('.search-bottom').hide();
        $('.search-bottom-alt').show()
    @endif
    function switchSeatch() {
        $("#banquet_list").empty();
        $("#banquet_name").val('');
        $(' .search-area').hide();
        $('.search-area-alt').show().addClass('anim-left');
        $('.search-bottom').hide();
        $('.search-bottom-alt').show().addClass('anim-left-result');


    }
    function initialSearch() {
        $("#address_list").empty();
        $("#address").val('');
          $("#hall").val('');
        $('.search-area-alt').hide();
        $('.search-area').show().addClass('anim-left');
        $('.search-bottom').show().addClass('anim-left-result');
        $('.search-bottom-alt').hide();
    }
 $(document).ready(function () {
        $('#banquet_name').keyup(function () {
           var query=$(this).val();
           if (query !=''){
               var _token=$('input[name="_token"]').val();
               $.ajax({
                   url:"{{route('pages.fetch')}}",
                   type:"POST",
                   data:{query:query,_token:_token},
                   success:function (data) {
                    //   console.log("data::"+data);
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
                    type:"POST",
                    data:{query:query,_token:_token},
                    success:function (data) {
                        var div = document.getElementById('address_list');
                        div.innerHTML = data;
                    }
                })
            }
        });
    })
    
    $(document).on('click','li',function() {

        $('#address').val($(this).text());
        $('#address_list').empty();
    })
    
    function redirectbanquet(){
        var query=document.getElementById('banquet_name').value;
        if (query.length>=2){
            window.location.href = '/search/'+query;
        }
    }
    
    function redirectaddress(){
        var hall=document.getElementById('capacity').value;
        var address=document.getElementById('address').value;
        if (hall!="" & address!=""){
            window.location.href = '/search/'+address+'/'+hall;
        }
    }
</script>
