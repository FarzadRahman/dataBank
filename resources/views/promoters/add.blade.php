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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Add Promoter</h4>
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

                <form method="post" enctype="multipart/form-data" action="{{route('promoter.insert')}}" accept-charset="utf-8">
                    <input type="hidden" id="promoterForm" name="promoterForm" value="">
                    <input type="hidden" name="candidateId" value="{{$id}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Promoter Name</label>
                            <input type="text" name="name" placeholder="name" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Promoter Phone Number</label>
                            <input type="text" name="phoneNumber" placeholder="Phone Number" onkeypress="return isNumberKey(event)" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Party</label>
                            <select class="form-control" name="party" required>
                                <option value="">Select Party</option>
                                @foreach($allParties as $party)
                                    <option value="{{$party->partyId}}">{{$party->partyName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-md-2">Image</label>
                            <input type="file" id="image" name="image" accept="image/*" placeholder="Promoter image" class="form-control col-md-4" />


                        </div>

                        <div class="form-group col-md-12">
                            <label>Promoter remark</label>
                            <textarea name="remark" class="form-control" placeholder="remark" rows="5" required></textarea>
                        </div>



                    </div>

                <div class="tab">
                    <a class="tablinks" onclick="openPromoterAddForm(event, 'PromoterAddForm')" >Insert Data</a>
                   <a class="tablinks" onclick="openPromoterAddForm(event, 'PromoterUploadDocument')">Upload Document</a>

                </div>

                <div id="PromoterAddForm" class="tabcontent">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Blood Group</label>
                            <select class="form-control" name="bloodGroup">
                                <option value="">Select Group</option>
                                @foreach(BLOOD_GROUP as $key=>$value)
                                    <option  value="{{$value}}" >{{$key}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label>NID </label>
                            <input type="text" name="nid" placeholder="NID" onkeypress="return isNumberKey(event)" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Date of Birth</label>
                            <input type="text"  name="dob" class="form-control" id="dob" placeholder="">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Gender </label>
                            <select  name="gender" class="form-control" id="sel1">
                                <option selected value="">Select Gender</option>
                                @foreach(GENDER as $key=>$value)
                                    <option  value="{{$value}}">{{$key}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Address</label>
                            <textarea rows="3"  name="address" class="form-control "></textarea>

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
                        <button class="btn btn-success">Insert</button>
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


        $(function () {
            $('#dob').datepicker({
                format: 'yyyy-m-d'
            });
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
