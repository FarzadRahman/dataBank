@extends('main')
@section('content')
    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Voters</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Male</label>
                            <input class="form-control" value="800">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Female</label>
                            <input class="form-control" value="700">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Total</label>
                            <input class="form-control" value="1500">
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{--Centers--}}
    <div class="modal" id="centerModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Centers</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <table class="table">
                       <thead>
                        <th>Center Name</th>
                        <th>Total Voter</th>
                       </thead>
                       <tbody>
                        <tr>
                            <td>center 1</td>
                            <td>500</td>
                        </tr>
                        <tr>
                            <td>center 2</td>
                            <td>500</td>
                        </tr>
                        <tr>
                            <td>center 3</td>
                            <td>500</td>
                        </tr>
                       </tbody>
                   </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 align="center">Constituency</h3>
        </div>

        <div class="card-body">
            <button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button>
            <table class="table table-striped">
                <thead>
                    <th>number</th>
                    <th>name</th>
                    <th>area</th>
                    <th>division</th>
                    <th>voter</th>
                    <th>center</th>
                    <th>candidates</th>
                </thead>
                <tbody>
                    <tr>
                        <td>05</td>
                        <td>Kishoreganj-5</td>
                        <td>Katiadi </td>
                        <td>Dhaka Division</td>
                        <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                1500
                            </button></td>
                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#centerModal">
                                5
                            </button></td>
                        <td><a href="{{route('candidates.index')}}">3</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>



@endsection