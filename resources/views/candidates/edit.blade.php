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
                <h4 align="center">Add Candidate</h4>
            </div>
            <div class="card-body">

                <div class="tab">
                    <button class="tablinks" onclick="openCandidateAddForm(event, 'CandidateAddForm')">Insert Data</button>
                    <button class="tablinks" onclick="openCandidateAddForm(event, 'CandidateUploadDocument')">Upload Document</button>

                </div>

                <div id="CandidateAddForm" class="tabcontent">
                    <form method="post" enctype="multipart/form-data" action="{{route('candidates.update')}}" accept-charset="utf-8">
                        {{csrf_field()}}
                        <input type="hidden" name="candidateForm" value="1">
                        <input type="hidden" name="candidateid" value="{{$getCandidatesDetails->candidateId}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Candidate Name</label>
                                <input type="text" name="name" placeholder="name" class="form-control" value="{{$getCandidatesDetails->CandidateName}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Candidate Phone Number</label>
                                <input type="text" name="phoneNumber" placeholder="Phone Number" value="{{$getCandidatesDetails->phoneNumber}}" onkeypress="return isNumberKey(event)" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Party</label>
                                <select class="form-control" name="party" required>
                                    <option value="">Select Party</option>
                                    @foreach($allParties as $party)
                                        <option @if($getCandidatesDetails->party ==$party->partyId) selected @endif value="{{$party->partyId}}">{{$party->partyName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Constituency</label>
                                <select class="form-control" name="constituencyId" required>
                                    <option value="">Select Constituency</option>
                                    @foreach($allConstituencies as $constituency)
                                        <option @if($getCandidatesDetails->constituencyId ==$constituency->constituencyId) selected @endif  value="{{$constituency->constituencyId}}">{{$constituency->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Candidate remark</label>
                                <textarea name="remark" class="form-control"  placeholder="remark" rows="5" required>{{$getCandidatesDetails->remark}}</textarea>
                            </div>
                            <div class="form-group col-md-6">

                                <label class="col-md-2">Image</label>
                                <input type="file" id="image" name="image" accept="image/*" placeholder="Candidate image" class="form-control col-md-4" />


                            </div>

                            <div class="form-group col-sm-12">
                                <button class="btn btn-success">Insert</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div id="CandidateUploadDocument" class="tabcontent">

                    <form method="post" enctype="multipart/form-data" action="{{route('candidates.update')}}" accept-charset="utf-8">
                        {{csrf_field()}}
                        <input type="hidden" name="candidateForm" value="2">
                        <input type="hidden" name="candidateid" value="{{$getCandidatesDetails->candidateId}}">

                        <div class="form-group col-md-12">

                            <label class="col-md-2">Upload</label>
                            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Candidate Document" class="form-control col-md-8" />


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
        function openCandidateAddForm(evt, cityName) {
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

        @if($getCandidatesDetails->profile == null)

        openCandidateAddForm(event, 'CandidateAddForm');
        @else
        openCandidateAddForm(event, 'CandidateUploadDocument');
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
