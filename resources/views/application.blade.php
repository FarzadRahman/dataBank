@extends('main')
@section('content')
    <div class="">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="card-header-tabs">
                                <h4>Manage Application</h4>
                            </div>

                            <!--                        <div align="right">-->
                            <!--                            <a href="cvform.php"> <button class="btn btn-info">Add New</button></a>-->
                            <!--                        </div>-->
                            <br>
                            <div class="row">
                                <div class=" form-group col-lg-2">
                                    <label>Zone</label>
                                    <select class="form-control">
                                        <option>Select a Zone</option>
                                        <option>Dhaka</option>
                                        <option>Khulna</option>
                                        <option>Barishal</option>
                                        <option>Rangpur</option>

                                    </select>
                                </div>
                                <div class=" form-group col-lg-1">
                                    <label>Age to</label>
                                    <input class="form-control" type="number">
                                </div>
                                <div class=" form-group col-lg-1">
                                    <label>Age From</label>
                                    <input class="form-control" type="number">
                                </div>
                                <div class=" form-group col-lg-2">
                                    <label>Gender</label>
                                    <select class="form-control">
                                        <option>Select a Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>

                                    </select>
                                </div>
                                <div class=" form-group col-lg-2">
                                    <label>Apply Date</label>
                                    <input class="form-control" type="date">
                                </div>
                                <div class=" form-group col-lg-2">
                                    <label>Religion</label>
                                    <select class="form-control">
                                        <option>Select a Religion</option>
                                        <option>Islam</option>
                                        <option>Hindu</option>
                                        <option>Christian</option>

                                    </select>
                                </div>

                                <div class=" form-group col-lg-2">
                                    <label>Job Title</label>
                                    <input class="form-control" type="text">
                                </div>

                            </div>

                            <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                                <thead>
                                <tr>
                                    <th width="4%">Select</th>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>Zone</th>
                                    <th>Apply Date</th>

                                    <th width="8%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Manager</td>
                                    <td>Dhaka</td>
                                    <td>2018/04/10</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Forhad Uddin</td>
                                    <td>HR</td>
                                    <td>Rangpur</td>

                                    <td>2018/06/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Farzad Rahman</td>
                                    <td>Web Developer</td>
                                    <td>Barishal</td>

                                    <td>2018/05/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Mujtaba Rumi</td>
                                    <td>Software Engineer</td>
                                    <td>Khulna</td>
                                    <td>2018/02/15</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Jr. Software Engineer </td>
                                    <td>Khulna</td>
                                    <td>2018/04/10</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Forhad Uddin</td>
                                    <td>Office Assistant</td>
                                    <td>Dhaka</td>

                                    <td>2018/06/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Farzad Rahman</td>
                                    <td>Jr. Software Engineer </td>
                                    <td>Barishal</td>

                                    <td>2018/05/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Mujtaba Rumi</td>
                                    <td>Web Developer</td>
                                    <td>Dhaka</td>

                                    <td>2018/02/15</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Manager</td>
                                    <td>Barishal</td>
                                    <td>2011/04/25</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Sr. Manager</td>
                                    <td>Dhaka</td>

                                    <td>2018/04/25</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Manager</td>
                                    <td>Dhaka</td>

                                    <td>2011/04/25</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>





                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>Manager</td>
                                    <td>Khulna</td>
                                    <td>2011/04/25</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Sakib Rahman</td>
                                    <td>HR</td>
                                    <td>Barishal</td>
                                    <td>2018/04/10</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>Forhad Uddin</td>
                                    <td>Software Engineer</td>
                                    <td>Dhaka</td>

                                    <td>2018/06/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Farzad Rahman</td>
                                    <td>Manager</td>
                                    <td>Dhaka</td>

                                    <td>2018/05/12</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td> Mujtaba Rumi</td>
                                    <td>Web Developer</td>
                                    <td>Khulna</td>
                                    <td>2018/02/15</td>
                                    <td><button class="btn btn-sm btn-success">Accept</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                            <br>

                            <label class="checkbox-inline"> <input type="checkbox" value=""> </label> Select All

                            <div style="margin-top: 10px;" class="row">

                                <div class="col-md-1">
                                    <button class="btn btn-danger">Export CV</button>
                                </div>
                                <div class="col-md-4">

                                    <button class="btn btn-info">Download CV</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- end container -->

    </div>



@endsection
@section('foot-js')
    <script>
        $(document).ready(function() {
            $('#manageapplication').DataTable(

                {
                    "columnDefs": [
                        {
                            "targets": [0,1,2,3,5], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ]
                }
            );
        } );
    </script>

@endsection