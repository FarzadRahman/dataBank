@extends('main')
@section('content')
    <!-- Add Center Modal -->
    <div class="modal" id="addCenterModal">
        <div class="modal-dialog" style="max-width: 70%;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Center</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('center.insert')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$consituency->constituencyId}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Center Name</label>
                                <input type="text" class="form-control" name="centerName" placeholder="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Location</label>
                                <textarea class="form-control" name="location" placeholder="location" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Male Voter</label>
                                <input type="text" class="form-control" name="maleVoter" placeholder="male">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Female Voter</label>
                                <input type="text" class="form-control" name="femaleVoter" placeholder="female" >
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success btn-sm">Insert</button>
                            </div>
                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <!--Edit Center Modal -->
    <div class="modal" id="editCenterModal">
        <div class="modal-dialog" style="max-width: 70%;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Center</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="editCenterModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 align="center">Add Constituency</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('constituency.update',['id'=>$consituency->constituencyId])}}" accept-charset="utf-8">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Constituency Number</label>
                        <input type="text" name="number" placeholder="number" class="form-control" value="{{$consituency->number}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Constituency Name</label>
                        <input type="text" name="name" placeholder="name" class="form-control" value="{{$consituency->name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Constituency Area</label>
                        <textarea name="area" class="form-control" placeholder="area" rows="5" required>{{$consituency->area}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Division</label>
                        <select class="form-control" name="divisionId" required>
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{$division->divisionId}}" @if($division->divisionId==$consituency->divisionId) selected @endif>{{$division->divisionName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h5 align="center">Voter</h5>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Male</label>
                        <input class="form-control" name="maleVoter" type="text" value="{{$consituency->maleVoter}}" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Female</label>
                        <input class="form-control" name="femaleVoter" value="{{$consituency->femaleVoter}}" type="text" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-success pull-right">Update</button>
                    </div>

                </div>
            </form>


        </div>
    </div>
    <div class="col-md-12"><hr></div>
    <div class="card">
        <div class="card-header">
            <h5 align="center">Center</h5>
            <button class="btn btn-info btn-sm pull-right" onclick="addCenter()"><i class="fa fa-plus"></i></button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>SL</th>
                    <th>Center Name</th>
                    <th>Location</th>
                    <th>Male Voter</th>
                    <th>Female Voter</th>
                    <th>Total Voter</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @php($sl=0)
                    @foreach($centers as $center)
                        <tr>
                            <td>{{++$sl}}</td>
                            <td>{{$center->centerName}}</td>
                            <td>{{$center->location}}</td>
                            <td>{{$center->maleVoter}}</td>
                            <td>{{$center->femaleVoter}}</td>
                            <td>{{$center->maleVoter+$center->femaleVoter}}</td>
                            <td><button class="btn btn-sm btn-info" onclick="editCenter({{$center->centerId}})">Edit</button></td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
@section('foot-js')
    <script>
        function editCenter(x) {
            // editCenterModal
            // $("#editCenterModal").modal();
            $.ajax({
                type: 'POST',
                url: "{!! route('center.editCenter') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {
                    $("#editCenterModalBody").html(data);
                    $("#editCenterModal").modal();

                }
            });

        }

        function addCenter() {
            $("#addCenterModal").modal();
        }
    </script>

@endsection
