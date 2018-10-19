@extends('main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">


                <div class="card-body">
                    <div class="card-header-tabs">
                        <h4>Manage Education</h4>
                    </div>

                    <div align="right">
                        <a href="createEducation.php"> <button class="btn btn-info">Add New</button></a>
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


                            <td>HSC</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>SSC</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>BSc in CSE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>BSC in EEE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>MSc in CSE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>PhD</td>
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