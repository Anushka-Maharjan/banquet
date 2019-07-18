@include('include.header')
<div id="ban-360" style="background-image: url('{{asset('images/CAMERA.jpg')}}')">
    <script src="https://www.powr.io/powr.js?platform=html"></script><div class="powr-countdown-timer" id="6f8be033_1562566815"></div>    <div id="banquet_list">

    </div>
    Contains::{{$contains}}this<br>
    <input type="text" name="address" style="margin-left: 5%;" id="address">
    <div id="address_list">

    </div>
</div>
{{csrf_field()}}
<script>
    $(document).ready(function () {
        $('#banquet_name').keyup(function () {
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
    $(document).on('click','li',function() {
        console.log('clicked');
        $('#address').val($(this).text());
    })
</script>