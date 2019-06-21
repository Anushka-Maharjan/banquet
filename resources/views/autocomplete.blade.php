@include('include.header')
<div id="innerHeader" class="inner-header">
    <div class="banquet-logo">
    </div>
    <div class="inner-menu-container">
        <ul>
            <a id="ban-360-btn" href="#ban-360"> <li id="ban-360-title" class="col-md-3">360</li></a>
            <a id="banquet-info-btn" href="#banquet-info"> <li id="banquet-info-title" class="col-md-3">Information</li></a>
            <a id="booking-btn" href="#booking"><li id="booking-title" class="col-md-3">Contact</li></a>
            <a id="photo-btn" href="#photo"> <li id="photo-title" class="col-md-3">Gallery</li></a>
        </ul>
    </div>

</div>
<div id="ban-360" style="margin-top: 10%">
    <input type="text" name="banquet_name" id="banquet_name">
    <div id="banquet_list">

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
    })
</script>