@extends('main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Division List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Division Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dhaka</td>
                            <td><button class="btn btn-info btn-sm">edit</button></td>
                        </tr>
                        <tr>
                            <td>Chittagong</td>
                            <td><button class="btn btn-info btn-sm">edit</button></td>
                        </tr>
                        <tr>
                            <td>Khulna</td>
                            <td><button class="btn btn-info btn-sm">edit</button></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection