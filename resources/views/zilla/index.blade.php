@extends('main')

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Zilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{route('zilla.insert')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Zilla</label>
                            <input type="text" name="zillaName" placeholder="zilla name" class="form-control">
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
                <h4 class="modal-title">Add zilla</h4>
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

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 align="center">Zilla List</h4>
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i>
                </button>

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Zilla Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($zillas as $zilla)
                        <tr>
                            <td>{{$zilla->zillaName}}</td>
                            <td><button class="btn btn-info btn-sm" data-panel-id="{{$zilla->zillaId}}" onclick="editzilla(this)">edit</button></td>
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
        function editzilla(x) {
            var id=$(x).data('panel-id');

            $.ajax({
            type: 'POST',
            url: "{!! route('zilla.edit') !!}",
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