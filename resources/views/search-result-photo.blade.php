@include('include.header')

<div  class="container" style="background: linear-gradient(#2d7c9a, transparent); padding-top: 5rem; width: 100%; margin:0">
    <div class="result">

        <div class="search-area">

                <input autocomplete="off" class="search-field-alt left-curve width30 border-right" type="text" name="address" id="address" placeholder="Location...">
                <input autocomplete="off" class="search-field-alt width30" type="text" name="address" id="address" placeholder="Location...">
                <input autocomplete="off" class="search-field-alt width30 border-left" type="number"  name="capacity" id="capacity" placeholder="Hall capacity(E.g: 500)">            
            <button class="search-btn right-curve" onclick="redirectaddress()"><i class="fa fa-search"></i> </button>
        </div>

    

    </div>

</div>
<div id="banquet_list" class="p-search-res">
            
</div>
<div id="address_list" class="p-search-res">
            
</div>
<div class="container result-container">
    @if(count($photographers)==0)
        <div class="row">
            <div class="col-md-4">
                            <img src="{{asset('images/icon/glass-search.png')}}" class="img-responsive" style="height:10rem; position: relative; transform: translate(-50%,0);left:50%">

            </div>
            <div class="col-md-8">
                <h4 class="">Opps! We couldn't find any result for your search:</h4>
                    <h3>Address: <b>{{$address}}</b>, Genre: <b>{{$genre}}</b>, & 
                    @if ($photographer==2)
                        <b>Videographer</b>
                    @else
                        <b>Photographer</b>
                    @endif
                    </h3>
            </div>
        </div>
    @else
      
        <h3 class="text-center">Showing Result for
                    @if ($photographer==1)
                        <b>Videographer</b>
                    @else
                        <b>Photographer</b>
                    @endif
                    with address: {{$address}} and genre:{{$genre}}</h3>
        <div class=" showing-result" style=" padding-left:20%; padding-right:20%; padding-top:5%">
           @foreach ($photographers as $p)
             <div class="row r1">
                <div class="col-md-3">
                    <img src="{{asset('storage\photo\photos\thumbnail\\'.$p->banner)}}" class="img-responsive">
                </div>
                <div class="col-md-9">
                    <h4>{{$p->name}}</h4>
                    <div style="display: inline-flex">
                        <p><i class="fa fa-map-marker"></i>{{$p->address}}</p>
                        <?php $name=str_replace(" ","-",$p->name)?>
                        <a href="{{asset(url('portfolio/'.$name.'-'.$p->id))}}"><button class="service-enquiry-btn">Check Portfolio <i class="fa fa-chevron-right"></i></button></a>
                    </div>
    
                </div> 
            </div>
           @endforeach
        </div>
        <div class="text-center">{{$photographers->links()}}</div>
    @endif
</div>


<script>
 
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
