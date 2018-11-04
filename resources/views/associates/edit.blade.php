@extends('main')
@section('header')

    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab a {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color:  blue;
        }

        /* Change background color of buttons on hover */
        .tab a:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab a.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>

@endsection
@section('content')
    {{--Site Map--}}
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    <a href="{{route('constituency.index')}}">Constituency</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('constituency.edit',['id'=>$getAssociatesDetails->constituencyId])}}">{{$getAssociatesDetails->constituencyName}}</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.index',['id'=>$getAssociatesDetails->constituencyId])}}">Candidates</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.edit',['id'=>$getAssociatesDetails->candidateId])}}">{{$getAssociatesDetails->candidateName}}</a>
    <i class="fa fa-angle-double-right"></i>
    Associate :<a href="{{route('associate.view',['id'=>$getAssociatesDetails->associateId])}}">  {{$getAssociatesDetails->associateName}}</a>
    <i class="fa fa-angle-double-right"></i> Edit

    <br><br>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Edit Associate</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" enctype="multipart/form-data" action="{{route('associate.update')}}" accept-charset="utf-8">
                    <input type="hidden" id="associateForm" name="associateForm" value="">
                    <input type="hidden" name="associateId" value="{{$getAssociatesDetails->associateId}}">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Associate Name</label>
                            <input type="text" name="name" placeholder="name" class="form-control" value="{{$getAssociatesDetails->associateName}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Associate Phone Number</label>
                            <input type="text" name="phoneNumber" placeholder="Phone Number"value="{{$getAssociatesDetails->phoneNumber}}"  class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Party</label>
                            <select class="form-control" name="party" >
                                <option value="">Select Party</option>
                                @foreach($allParties as $party)
                                    <option @if($getAssociatesDetails->partyName ==$party->partyName) selected @endif value="{{$party->partyId}}">{{$party->partyName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-md-2">Image</label>
                            <input type="file" id="image" name="image" accept="image/*" placeholder="Associate image" class="form-control col-md-4" />


                        </div>

                        <div class="form-group col-md-12">
                            <label>Associate Remark</label>
                            <textarea name="remark" class="form-control" placeholder="remark" rows="5" >{{$getAssociatesDetails->remark}}</textarea>
                        </div>
                    </div>

                <div class="tab">
                    <a class="tablinks" onclick="openAssociateAddForm(event, 'AssociateAddForm')">Insert Data</a>
                    <a class="tablinks" onclick="openAssociateAddForm(event, 'AssociateUploadDocument')">Upload Document</a>
                </div>

                <div id="AssociateAddForm" class="tabcontent">
                    
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Blood Group</label>
                            <select class="form-control" name="bloodGroup">
                                <option value="">Select Group</option>
                                @foreach(BLOOD_GROUP as $key=>$value)
                                    <option  @if($getAssociatesDetails->bloodGroup==$value) selected @endif value="{{$value}}" >{{$key}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label>NID </label>
                            <input type="text" name="nid" placeholder="NID" value="{{$getAssociatesDetails->nid}}" onkeypress="return isNumberKey(event)" class="form-control">
                        </div>
                        {{--Start New Update--}}



                        <div class="form-group col-md-6">
                            <label for="">Date Of Birth</label>
                            <input type="text"  name="dob" class="form-control" id="dob" value="{{$getAssociatesDetails->dob}}" placeholder="">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Age</label>
                            <input type="text"  name="age" class="form-control" value="{{$getAssociatesDetails->age}}"  placeholder="">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="">Gender</label>
                            <select  name="gender" class="form-control" id="sel1">
                                <option selected value="">Select Gender</option>
                                @foreach(GENDER as $key=>$value)
                                    <option @if($getAssociatesDetails->gender == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Marital Status</label>

                            <select  name="marital" class="form-control" >
                                <option  value="">Select Status</option>
                                @foreach(MARITAL_STATUS as $value)
                                    <option  value="{{$value}}" @if($value==$getAssociatesDetails->marital)selected @endif>{{$value}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Spouse Name</label>
                            <input type="text"  name="spouse" class="form-control" value="{{$getAssociatesDetails->spouse}}"  placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Spouse Number</label>
                            <input type="text"  name="spouseNumber" class="form-control" value="{{$getAssociatesDetails->spouseNumber}}"  placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Father Name</label>
                            <input type="text"  name="father" class="form-control" value="{{$getAssociatesDetails->father}}"  placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Father Number</label>
                            <input type="text"  name="fatherNumber" class="form-control" value="{{$getAssociatesDetails->fatherNumber}}"  placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Mother Name</label>
                            <input type="text"  name="mother" class="form-control" value="{{$getAssociatesDetails->mother}}" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Mother Number</label>
                            <input type="text"  name="motherNumber" class="form-control" value="{{$getAssociatesDetails->motherNumber}}"  placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Religion</label>
                            <input type="text"  name="religion" class="form-control"  value="{{$getAssociatesDetails->religion}}" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Occupation</label>
                            <input type="text"  name="occupation" class="form-control" value="{{$getAssociatesDetails->occupation}}"  placeholder="">
                        </div>
                    </div>

                    {{--End Of New Update--}}


                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Address</label>
                            <textarea rows="3"  name="address" class="form-control ">{{$getAssociatesDetails->address}}</textarea>

                        </div>

                    </div>
                    
                </div>
                <div id="AssociateUploadDocument" class="tabcontent">
                    

                        <div class="form-group col-md-12">

                            <label class="col-md-2">Upload</label>
                            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Associate Document" class="form-control col-md-8" />


                        </div>
                    @if($getAssociatesDetails->profile)
                        <div class="col-md-2">

                            <div class="col-md-6 mb-3">
                         Delete Profile<input  class="form-check-input" type="checkbox"  name="deleteImage">
                            </div>

                        </div>
                    @endif
                        

                </div>
                    <br>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <button class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </form>


            </div>
        </div>
    </div>



@endsection
@section('foot-js')
    <script>

        function openAssociateAddForm(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";

            if (cityName=='AssociateAddForm'){

                $("#associateForm").val('1');

            }else if(cityName=='AssociateUploadDocument') {

                $("#associateForm").val('2');

            }
        }
        
        $(function () {
            // $('#dob').datepicker({
            //     format: 'yyyy-m-d'
            // });

            @if($getAssociatesDetails->profile == null)
            openAssociateAddForm(event, 'AssociateAddForm');
            $("#associateForm").val('1');
            @else
            openAssociateAddForm(event, 'AssociateUploadDocument');
            $("#associateForm").val('2');
            @endif

        });

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

    </script>
@endsection
