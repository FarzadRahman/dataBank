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
    <a href="{{route('constituency.index')}}">Constituency</a>
    =>
    <a href="{{route('constituency.edit',['id'=>$getAssociatesDetails->constituencyId])}}">{{$getAssociatesDetails->constituencyName}}</a>
    =>
    <a href="{{route('candidates.index',['id'=>$getAssociatesDetails->constituencyId])}}">candidates</a>
    =><a href="{{route('candidates.edit',['id'=>$getAssociatesDetails->constituencyId])}}">{{$getAssociatesDetails->candidateName}}</a>
    =>Associate :<a href="{{route('associate.view',['id'=>$getAssociatesDetails->associateId])}}">  {{$getAssociatesDetails->associateName}}</a>
    => Edit

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Add Associate</h4>
            </div>
            <div class="card-body">

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
                            <input type="text" name="phoneNumber" placeholder="Phone Number"value="{{$getAssociatesDetails->phoneNumber}}" onkeypress="return isNumberKey(event)" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Party</label>
                            <select class="form-control" name="party" required>
                                <option value="">Select Party</option>
                                @foreach($allParties as $party)
                                    <option @if($getAssociatesDetails->party ==$party->partyId) selected @endif value="{{$party->partyId}}">{{$party->partyName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-md-2">Image</label>
                            <input type="file" id="image" name="image" accept="image/*" placeholder="Associate image" class="form-control col-md-4" />


                        </div>

                        <div class="form-group col-md-12">
                            <label>Associate remark</label>
                            <textarea name="remark" class="form-control" placeholder="remark" rows="5" required>{{$getAssociatesDetails->remark}}</textarea>
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Date of Birth</label>
                            <input type="text"  name="dob" class="form-control" id="dob" value="{{$getAssociatesDetails->dob}}" placeholder="">

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
                    </div>

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
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });

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
