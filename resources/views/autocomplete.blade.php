@include('include.header')
<div id="ban-360" style="margin-top: 10%">
    {{--<input type="text" name="banquet_name" id="banquet_name">--}}
    {{--<div id="banquet_list">--}}

    {{--</div>--}}

    <input type="text" name="address" style="margin: 5%" id="address">
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
</script>