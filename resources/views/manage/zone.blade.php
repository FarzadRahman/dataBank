@extends('main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">


                <div class="card-body">
                    <div class="card-header-tabs">
                        <h4>Manage Zone</h4>
                    </div>

                    <div align="right">
                        <a href="createzone.php"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Zone Name</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Brisal</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>


                        </tbody>

                    </table>
                    <br>


                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->




@endsection
@section('foot-js')


@endsection