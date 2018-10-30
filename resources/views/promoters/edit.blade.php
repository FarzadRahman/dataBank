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
        .tab button {
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
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
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
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('constituency.edit',['id'=>$getPromotersDetails->constituencyId])}}">{{$getPromotersDetails->constituencyName}}</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.index',['id'=>$getPromotersDetails->constituencyId])}}">candidates</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.edit',['id'=>$getPromotersDetails->constituencyId])}}">{{$getPromotersDetails->candidateName}}</a>
    <i class="fa fa-angle-double-right"></i>
    Promoter :<a href="{{route('promoter.view',['id'=>$getPromotersDetails->promotersId])}}"> {{$getPromotersDetails->promoterName}}</a>
    <i class="fa fa-angle-double-right"></i> Edit


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Edit Promoter</h4>
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

                <form method="post" enctype="multipart/form-data" action="{{route('promoter.update')}}" accept-charset="utf-8">
                    <input type="hidden" id="promoterForm" name="promoterForm" value="">
                    <input type="hidden" name="promoterId" value="{{$getPromotersDetails->promotersId}}">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Promoter Name</label>
                            <input type="text" name="name" placeholder="name" class="form-control" value="{{$getPromotersDetails->promoterName}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Promoter Phone Number</label>
                            <input type="text" name="phoneNumber" placeholder="Phone Number"value="{{$getPromotersDetails->phoneNumber}}" onkeypress="return isNumberKey(event)" class="form-control" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Party</label>
                            <select class="form-control" name="party" required>
                                <option value="">Select Party</option>
                                @foreach($allParties as $party)
                                    <option @if($getPromotersDetails->partyName ==$party->partyName) selected @endif value="{{$party->partyId}}">{{$party->partyName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-md-2">Image</label>
                            <input type="file" id="image" name="image" accept="image/*" placeholder="Promoter image" class="form-control col-md-4" />


                        </div>

                        <div class="form-group col-md-12">
                            <label>Promoter remark</label>
                            <textarea name="remark" class="form-control" placeholder="remark" rows="5" required>{{$getPromotersDetails->remark}}</textarea>
                        </div>
                    </div>

                <div class="tab">
                    <button type="button" class="tablinks" onclick="openPromoterAddForm(event, 'PromoterAddForm')">Update Data</button>
                    <button type="button" class="tablinks" onclick="openPromoterAddForm(event, 'PromoterUploadDocument')">Upload Document</button>

                </div>

                <div id="PromoterAddForm" class="tabcontent">
                   




                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Blood Group</label>
                            <select class="form-control" name="bloodGroup">
                                <option value="">Select Group</option>
                                @foreach(BLOOD_GROUP as $key=>$value)
                                    <option  @if($getPromotersDetails->bloodGroup==$value) selected @endif value="{{$value}}" >{{$key}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label>NID </label>
                            <input type="text" name="nid" placeholder="NID" value="{{$getPromotersDetails->nid}}" onkeypress="return isNumberKey(event)" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Date of Birth</label>
                            <input type="text"  name="dob" class="form-control" id="dob" value="{{$getPromotersDetails->dob}}" placeholder="">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Gender</label>
                            <select  name="gender" class="form-control" id="sel1">
                                <option selected value="">Select Gender</option>
                                @foreach(GENDER as $key=>$value)
                                    <option @if($getPromotersDetails->gender == $value) selected @endif value="{{$value}}">{{$key}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Address</label>
                            <textarea rows="3"  name="address" class="form-control ">{{$getPromotersDetails->address}}</textarea>

                        </div>

                    </div>
                    
                </div>
                <div id="PromoterUploadDocument" class="tabcontent">

                        <div class="form-group col-md-12">

                            <label class="col-md-2">Upload</label>
                            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Promoter Document" class="form-control col-md-8" />


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

        function openPromoterAddForm(evt, cityName) {
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

            if (cityName=='PromoterAddForm'){

                $("#promoterForm").val('1');

            }else if(cityName=='PromoterUploadDocument') {

                $("#promoterForm").val('2');

            }

        }


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        $(function () {
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });

            @if($getPromotersDetails->profile == null)

            openPromoterAddForm(event, 'PromoterAddForm');
            $("#promoterForm").val('1');
            @else
            openPromoterAddForm(event, 'PromoterUploadDocument');
            $("#promoterForm").val('2');
            @endif

        });

    </script>
@endsection
