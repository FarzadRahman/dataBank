@extends('main')
@section('content')

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Party</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('party.insert')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Party</label>
                                <input type="text" name="partyName" placeholder="party name" class="form-control" required>
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
                    <h4 class="modal-title">Update Party</h4>
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
                <h4 align="center">Party List</h4>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <th>Party Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($party as $party)
                    <tr>
                        <td>{{$party->partyName}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-panel-id="{{$party->partyId}}" onclick="editParty(this)">edit</button>
                            <a href="{{route('party.level',['partyid'=>$party->partyId])}}" class="btn btn-success btn-sm">view</a>
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
        function editParty(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('party.edit') !!}",
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