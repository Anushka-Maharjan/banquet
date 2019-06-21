@include('admin.includes.header')
{{--@include('layouts.app')--}}
<div id="page-content-wrapper">
    @include('admin.includes.messages')

    <div class="section-wrapper">
<div class="container col-md-8 col-md-offset-2 ">
    <div class="card">
        <form class="form-inline choose">
            <label class="col-sm-3 col-sm-offset-1" for="month">Choose: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Baisakh</option>
                <option value=1>Jestha</option>
                <option value=2>Asad</option>
                <option value=3>Shrawan</option>
                <option value=4>Bhadra</option>
                <option value=5>Asoj</option>
                <option value=6>Kartik</option>
                <option value=7>Mangsir</option>
                <option value=8>Poush</option>
                <option value=9>Magh</option>
                <option value=10>Falgun</option>
                <option value=11>Chaitra</option>
            </select>

            <label for="year"></label>
            <select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                <option value=2076>2076</option>
                <option value=2077>2077</option>
                <option value=2078>2078</option>
                <option value=2079>2079</option>
            </select>
        </form>
        <div class="form-inline ">
            <div class="col-md-8 col-md-offset-3">
                <button class="btn col-sm-2  pn-btn" id="previous" onclick="previous()"><i class="fa fa-chevron-left no-left"></i></button>
                <h3 class="card-header col-sm-8  text-center" id="monthAndYear"></h3>
                <input type="hidden" id="monthyear" >
                <button class="btn col-sm-2 btn-outline-primary pn-btn" id="next" onclick="next()"><i class="fa fa-chevron-right no-left"></i></button>
            </div>
        </div>
        <table  id="calendar" class="width100">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>
        </div>

        <br/>

</div>

<div class="modal fade" id="showDetailInfo" role="dialog">
    <div class="modal-dialog" id="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="displayDivs()">&times;</button>
            </div>
            <div class="modal-body" style="height: 400px">
                <div class=" col-sm-6" style="border-right: 2px solid grey">
                    <h2 class="modal-heading">Morning</h2>
                    <div class="form-morning" >
                    {!! Form::open(['action'=>'EventsController@store','method'=>'POST','class'=>'form-horizontal','id'=>'form-form-morning']) !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Customer Name*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="morning-customer_name" name="customer_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Contact*</label>
                            <div class="col-sm-9">
                                <input type="text" id="morning-contact" class="form-control" name="contact">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" id="morning-address" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Advance</label>
                            <div class="col-sm-9">
                                <input type="text" id="morning-advance" class="form-control" name="advance">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estimated PAX</label>
                            <div class="col-sm-9">
                                <input type="text" id="morning-expected_pax" class="form-control" name="expected_pax">
                            </div>
                        </div>
                        <input type="hidden" name="shift" value="morning">
                        <input type="hidden" name="day" id="day">
                        <input type="hidden" name="hall" value="{{$hall}}">
                        <div class="col-sm-3 col-sm-offset-2">
                            <input type="submit" value="Save" id="morning-submit" class="btn btn-success">
                        </div>

                    {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <h2 class="modal-heading">Evening</h2>
                    <div id="form-evening">
                    {!! Form::open(['action'=>'EventsController@store','method'=>'POST','class'=>'form-horizontal','id'=>'form-form-evening']) !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Customer Name*</label>
                            <div class="col-sm-9">
                                <input type="text" id="evening-customer_name" class="form-control" name="customer_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Contact*</label>
                            <div class="col-sm-9">
                                <input type="text" id="evening-contact" class="form-control" name="contact">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" id="evening-address" class="form-control" name="address">
                            </div>
                        </div>
                        {{--<input type="hidden" name="_method" value="PUT">--}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Advance</label>
                            <div class="col-sm-9">
                                <input type="text" id="evening-advance" class="form-control" name="advance">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estimated PAX</label>
                            <div class="col-sm-9">
                                <input type="text" id="evening-expected_pax" class="form-control" name="expected_pax">
                            </div>
                        </div>
                        <input type="hidden" name="shift" value="evening">
                        <input type="hidden" class="day" name="day" id="day">
                        <input type="hidden" name="hall" value="{{$hall}}">

                        <div class="col-sm-3 col-sm-offset-2">
                            <input type="submit" value="Save" id="evening-submit" class="btn btn-success">
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="displayDivs()">Close</button>

            </div>
        </div>
    </div>
</div>
    </div>
</div>
<script>
    var fields=['customer_name','contact','address','contact','expected_pax','advance'];

    function displayModel(date) {
        var thisDay=null;
        var shift=null;
        <?php
        foreach ($events as $event){
            echo "thisDay=\"".$event->day."\";";
            echo "shift=\"".$event->shift."\";";
           echo "if (thisDay==date){
           form=document.getElementById(\"form-form-\"+shift);
           form.action=\"/admin/calendar/".$event->id."\";
            document.getElementById(shift+\"-\"+fields[0]).value=\"".$event->customer_name."\";
            document.getElementById(shift+\"-\"+fields[0]).disabled=true;
            document.getElementById(shift+\"-\"+fields[1]).value=\"".$event->contact."\";
            document.getElementById(shift+\"-\"+fields[1]).disabled=true;
            document.getElementById(shift+\"-\"+fields[2]).value=\"".$event->address."\";
            document.getElementById(shift+\"-\"+fields[2]).disabled=true;
            document.getElementById(shift+\"-\"+fields[3]).value=\"".$event->contact."\";
            document.getElementById(shift+\"-\"+fields[3]).disabled=true;
            document.getElementById(shift+\"-\"+fields[4]).value=\"".$event->expected_pax."\";
            document.getElementById(shift+\"-\"+fields[4]).disabled=true;
            document.getElementById(shift+\"-\"+fields[5]).value=\"".$event->advance."\";
            document.getElementById(shift+\"-\"+fields[5]).disabled=true;

            document.getElementById(shift+\"-submit\").style.display=\"none\";
               var inputField=document.createElement(\"INPUT\");
               inputField.className=\"hidden\";
               inputField.name=\"_method\";
               inputField.setAttribute('value','PUT');
                 document.getElementById('form-form-'+shift).appendChild(inputField);

               var editbtn = document.createElement(\"BUTTON\");
               editbtn.innerHTML=\"Edit\";
               editbtn.className=\"btn btn-info col-sm-2\";
               editbtn.onclick=function () {
                    editForm(shift);
                };
               editbtn.id=\"editbtn-\"+shift;

  document.getElementById('form-form-'+shift).appendChild(editbtn);
        }";
        }
        ?>
        $("#showDetailInfo").modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#day').val(date);
        $('.day').val(date);
        $('#showDetailInfo').modal({show:true});
    }
    function displayDivs() {
        document.getElementById("form-form-morning").action="EventsController@store";
        document.getElementById("form-form-evening").action="EventsController@store";

        fields.forEach(function (item) {
            document.getElementById("morning-"+item).value="";
            document.getElementById("morning-"+item).disabled=false;
            document.getElementById("evening-"+item).value="";
            document.getElementById("evening-"+item).disabled=false;
        });
        document.getElementById("morning-submit").style.display='block';
        document.getElementById("evening-submit").style.display='block';
        var elem= document.getElementById('editbtn-morning');
        if (elem){
            elem.parentElement.removeChild(elem);
        }
        elem= document.getElementById('editbtn-evening');
        if (elem){
            elem.parentElement.removeChild(elem);
        }
        elem= document.getElementById('morning-hidden');
        if (elem){
            elem.parentElement.removeChild(elem);
        }
        elem= document.getElementById('evening-hidden');
        if (elem){
            elem.parentElement.removeChild(elem);
        }

    }


    function editForm(shift){
        elem= document.getElementById('editbtn-'+shift);
        elem.parentElement.removeChild(elem);
        // console.log(day+" "+shift)
        // document.getElementById("form-form-"+shift).action="NewController@check"
        fields.forEach(function (item) {
            document.getElementById(shift+"-"+item).disabled=false;
        });

        document.getElementById(shift+"-submit").style.display="block";

        var editbtn = document.createElement("BUTTON");
        editbtn.innerHTML="Cancel Edit";
        editbtn.className="btn btn-danger col-sm-3";
        editbtn.onclick=function () {
            cancelEdit(shift);
        };
        editbtn.id="cancelEdit-"+shift;

        document.getElementById('form-form-'+shift).appendChild(editbtn);

    }

    function cancelEdit(shift){
        elem= document.getElementById('cancelEdit-'+shift);
        elem.parentElement.removeChild(elem);
        // console.log(day+" "+shift)
        // document.getElementById("form-form-"+shift).action="NewController@check"
        fields.forEach(function (item) {
            document.getElementById(shift+"-"+item).disabled=true;
        });

        document.getElementById(shift+"-submit").style.display="none";

        // elem= document.getElementById('editbtn-'+shift);
        // elem.style.display='block';
        var editbtn = document.createElement("BUTTON");
        editbtn.innerHTML="Edit";
        editbtn.className="btn btn-info col-sm-2";
        editbtn.onclick=function() {
            editForm(shift);
        }
        editbtn.id="editbtn-"+shift;

        document.getElementById('form-'+shift).appendChild(editbtn);
    }

</script>
@include('admin.includes.script')
@include('admin.includes.footer')