@include('admin.includes.header1')
@include('admin.includes.messages')
<div id="page-content-wrapper">
    <div class="title-section-wrapper">
        <h3>Add Photo</h3>
    </div>
    <div class="section-wrapper">
        {!! Form::open(['action'=>'PhotosController@store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
        {{--<div class="form-group">--}}
            {{--<label class="col-sm-2 control-label">Title*</label>--}}
            {{--<div class="col-sm-9">--}}
                {{--<input type="text" id="evening-contact" class="form-control" name="title">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <label class="col-sm-2 control-label">Photos*</label>
            <div class="col-sm-4">
                <input type="file" class="form-control" name="photos[]" id="photos" multiple />
            </div>
        </div>
        <div class="col-sm-3 col-sm-offset-2">
            <input type="submit" value="Save" class="btn btn-success">
        </div>
        {!! Form::close() !!}
    </div>
</div>

@include('admin.includes.footer')