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
                <h4 align="center">Add Promoter</h4>
            </div>
            <div class="card-body">

                <div class="tab">
                    <button class="tablinks" onclick="openPromoterAddForm(event, 'PromoterAddForm')">Update Data</button>
                    <button class="tablinks" onclick="openPromoterAddForm(event, 'PromoterUploadDocument')">Upload Document</button>

                </div>

                <div id="PromoterAddForm" class="tabcontent">
                    <form method="post" enctype="multipart/form-data" action="{{route('promoter.update')}}" accept-charset="utf-8">
                        <input type="hidden" name="promoterForm" value="1">
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
                                        <option @if($getPromotersDetails->party ==$party->partyId) selected @endif value="{{$party->partyId}}">{{$party->partyName}}</option>
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


                            <div class="form-group col-sm-12">
                                <button class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div id="PromoterUploadDocument" class="tabcontent">
                    <form method="post" enctype="multipart/form-data" action="{{route('promoter.update')}}" accept-charset="utf-8">
                        <input type="hidden" name="promoterForm" value="2">
                        <input type="hidden"  name="promoterId" value="{{$getPromotersDetails->promotersId}}">
                        {{csrf_field()}}

                        <div class="form-group col-md-12">

                            <label class="col-md-2">Upload</label>
                            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Promoter Document" class="form-control col-md-8" />


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
        }
        @if($getPromotersDetails->profile == null)

            openPromoterAddForm(event, 'PromoterAddForm');
        @else
        openPromoterAddForm(event, 'PromoterUploadDocument');
        @endif

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

    </script>
@endsection
