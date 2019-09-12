@include('admin.includes.header')
<div id="page-content-wrapper">
    @include('admin.includes.messages')
    <div class="title-section-wrapper">
        <h3>Photo List</h3>
    </div>
    <div class="section-wrapper" >
        <button class="btn btn-success" id="btnfileupload">Add Photo/s</button>
        {!! Form::open(['action'=>'PhotosController@store','method'=>'POST','class'=>'form-horizontal','id'=>'photoform','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            <div class="col-sm-4">
                <input type="file" name="photos[]" onchange="form.submit()" id="photos" style="display: none" multiple /><span id="spnFilePath"></span>
            </div>
        </div>
        {{--<div class="col-sm-3 col-sm-offset-2">--}}
            {{--<input type="submit" value="Save" class="btn btn-success">--}}
        {{--</div>--}}
        {!! Form::close() !!}

{{--        <a href="{{url('admin/photos/create')}}"><button class="btn btn-success">Add Photo/s</button></a>--}}
          <?php $i=1?>
        <div class="col-sm-12">
          @foreach($photos as $photo)
            <div class="col-sm-4 photo-album">
                <div class="col-sm-12">
                    <img src="{{asset($photo['photo'])}}" class="photo-album-image"   alt="">
                </div>
                <div class="col-sm-12 margin-3">
                    @if ($photo['selected']==1)
                        <button class="btn btn-success col-sm-4" disabled><i class="fa fa-check no-left"></i></button>
                    @else
                        <a href="{{url('admin/photos/'.$photo['id'].'/selected')}}" class="btn btn-success col-sm-6" onclick="return confirm('Do you really want to select this as your photos?')">Select as banner</a>
                    @endif
                    <a href="{{url('admin/photos/'.$photo['id'].'/delete')}}" class="btn btn-danger col-sm-3 col-sm-offset-2" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
<script>
    $("#btnfileupload").click(function () {
        $("#photos").click();
    });
</script>

@include('admin.includes.footer')