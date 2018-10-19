@extends('main')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Party List</h4>
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
                        <td><button class="btn btn-info btn-sm">edit</button></td>
                    </tr>
                    <tr>
                        <td>BNP</td>
                        <td><button class="btn btn-info btn-sm">edit</button></td>
                    </tr>
                    <tr>
                        <td>BJP</td>
                        <td><button class="btn btn-info btn-sm">edit</button></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection