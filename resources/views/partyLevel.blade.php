@extends('main')
@section('content')
    Committee List <i class="fa fa-angle-double-right"></i> <a href="{{route('party.index')}}">{{$party->partyName}}</a>
    <i class="fa fa-angle-double-right"></i> Party-Level
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Party-Level</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('partylevel.insert')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Level Name</label>
                                <input type="text" name="name" placeholder="party level name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-success pull-right">Insert</button>
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

    <!-- The Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Party-Level</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="editModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 align="center">{{$party->partyName}}</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></button>
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($partyLevels as $level)
                        <tr>
                            <td>{{$level->name}}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-panel-id="{{$level->party_levelId}}" onclick="editPartyLevel(this)">Edit</button>
                                <button class="btn btn-sm btn-success">View</button>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('foot-js')
    <script>
        function editPartyLevel(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('partylevel.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#editModalBody").html(data);
                    $('#editModal').modal();
                    // console.log(data);
                }
            });

        }
    </script>

@endsection