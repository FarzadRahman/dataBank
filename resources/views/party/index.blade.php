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
                                <input type="text" name="partyName" placeholder="party name" class="form-control">
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
                    <h4 class="modal-title">Add Division</h4>
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
                <button class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i></button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <th>Party Name</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>AL</td>
                        <td>
                            <button class="btn btn-info btn-sm">edit</button>
                            <a href="{{route('party.level')}}" class="btn btn-success btn-sm">view</a>
                        </td>
                    </tr>
                    <tr>
                        <td>BNP</td>
                        <td>
                            <button class="btn btn-info btn-sm">edit</button>
                            <a href="{{route('party.level')}}" class="btn btn-success btn-sm">view</a>
                        </td>
                    </tr>
                    <tr>
                        <td>BJP</td>
                        <td>
                            <button class="btn btn-info btn-sm">edit</button>
                            <a href="{{route('party.level')}}" class="btn btn-success btn-sm">view</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Jamati Islam</td>
                        <td>
                            <button class="btn btn-info btn-sm">edit</button>
                            <a href="{{route('party.level')}}" class="btn btn-success btn-sm">view</a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection