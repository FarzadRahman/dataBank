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

    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 align="center">Add Associate</h4>
        </div>
        <div class="card-body">

            <div class="tab">
                <button class="tablinks" onclick="openAssociateAddForm(event, 'AssociateAddForm')">Insert Data</button>
                <button class="tablinks" onclick="openAssociateAddForm(event, 'AssociateUploadDocument')">Upload Document</button>

            </div>

            <div id="AssociateAddForm" class="tabcontent">
            <form method="post" enctype="multipart/form-data" action="{{route('associate.insert')}}" accept-charset="utf-8">
                <input type="hidden" name="associateForm" value="1">
                <input type="hidden" name="candidateId" value="{{$id}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Associate Name</label>
                        <input type="text" name="name" placeholder="name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Associate Phone Number</label>
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
                        <input type="file" id="image" name="image" accept="image/*" placeholder="Associate image" class="form-control col-md-4" />


                    </div>

                    <div class="form-group col-md-12">
                        <label>Associate remark</label>
                        <textarea name="remark" class="form-control" placeholder="remark" rows="5" required></textarea>
                    </div>


                    <div class="form-group col-sm-12">
                    <button class="btn btn-success">Insert</button>
                    </div>

                </div>
            </form>
            </div>
            <div id="AssociateUploadDocument" class="tabcontent">
                <form method="post" enctype="multipart/form-data" action="{{route('associate.insert')}}" accept-charset="utf-8">
                <input type="hidden" name="associateForm" value="2">
                    <input type="hidden" name="candidateId" value="{{$id}}">
                {{csrf_field()}}

                <div class="form-group col-md-12">

                    <label class="col-md-2">Upload</label>
                    <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Associate Document" class="form-control col-md-8" />


                </div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-success">Insert</button>
                </div>
                </form>

            </div>


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
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

    </script>
@endsection
