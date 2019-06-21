@include('admin.includes.header')

<div id="page-content-wrapper">
    @include('admin.includes.messages')
    <div class="title-section-wrapper">
        <h3>Configure Profile</h3>
    </div>
    <div class="section-wrapper">
        {!! Form::open(['action'=>'BanquetsController@store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}


        <div class="form-group" >
            <label class="col-sm-2 control-label">Subdomain*<br><p style="font-size: 11px">(<i>subdomain</i>.website.com)</p></label>
            <div class="col-sm-4" >
                <input type="text" id="username" class="form-control" name="username" value="{{ old('username') }}">
                <span id="username_error"></span>
            </div>
            <div class="col-sm-3">
                <p style="font-size: 12px">For example: subdomain name 'banquet-name' will result link: banquet-name.website.com</p>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-2 control-label">Contact*</label>
            <div class="col-sm-4" >
                <input type="text" id="contact" class="form-control" name="contact"  value="{{ old('contact') }}" >
            </div>
            <div class="col-sm-3">
                <p style="font-size: 12px">Keep as many contact as necessary separated by commas(,)</p>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-2 control-label">Address*</label>
            <div class="col-sm-4" >
                <input type="text" id="address" class="form-control" name="address"  value="{{ old('address') }}">
            </div>
        </div>
        <div class="form-group" >
            <div class="col-sm-12">
                <label class="col-sm-2 control-label">No. of Halls*</label>
                <div class="col-sm-4" >
                    <input type="number" id="hall" style="margin-bottom: 1%" class="form-control" name="hall"  >
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-2">
                <div id="hall-capacity" >

                </div>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-sm-2 control-label">Parking</label>
            <label class="col-sm-1 control-label">Bike*</label>
            <div class="col-sm-3" >
                <input type="number" id="bike"  class="form-control" name="bike"  value="{{ old('bike') }}">
            </div>
            <label class="col-sm-1 control-label">Car*</label>
            <div class="col-sm-3" >
                <input type="number" id="car" class="form-control" name="car"  value="{{ old('car') }}">
            </div>
        </div>
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">Logo*</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="logo" id="logo" required/>
            </div>
            <label class="col-sm-1 control-label">Banner*</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="banner"  id="banner" required />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Pricing*</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="pricing" id="pricing" required/>
            </div>
            <label class="col-sm-1 control-label">Menu*</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="menu" id="menu" required/>
            </div>
        </div>

        <div class="col-sm-3 col-sm-offset-2">
            <input type="submit" id="submit" value="Save" class="btn btn-success">
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>
    $(document).ready(function() {
        var div = $("#hall-capacity"); //Input fields wrapper
        var field = $("#hall"); //Add button class or ID
        var x = 1; //Initial input field is set to 1

        //When user click on add input button
        $(field).keyup(function () {
            $('#hall-capacity').empty();
            hall=$(field).val();
            for (x=1;x<=hall;x++){
                $(div).append('<div class="col-sm-3"><input type="number" name="capacities[]" style="margin-bottom: 1%" id="capacities" class=" form-control"  placeholder="Capacity for Hall '+x+'" /></div>');
            }
        });

        $('#username').blur(function () {
            var username=$('#username').val();
            var _token=$('input[name="_token"]').val();
            var filter=RegExp('^[a-z-]+[a-z]+$');
            if (!filter.test(username)){
                $('#username').addClass('has-error');
                $('#username_error').html('<label class="text-danger">Invalid Subdomain name(username only contain small letters and dash(-) and cannot end with dash(-))</label>')
                $('#submit').attr('disabled','disabled');
            }else{
                $.ajax({
                    url:"{{route('banquets.checkusername')}}",
                    method:"POST",
                    data:{username:username,_token:_token},
                    success:function (data) {
                        if (data=='unique'){
                            $('#username_error').html('<label class="text-success">Subdomain Available</label>');
                            $('#username').removeClass('has-error');
                            $('#submit').attr('disabled', false);
                        }else{
                            $('#username_error').html('<label class="text-danger">Subdomain not Available</label>');
                            $('#username').addClass('has-error');
                            $('#submit').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        })
    });
</script>

@include('admin.includes.footer')