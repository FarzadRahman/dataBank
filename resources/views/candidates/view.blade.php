@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Details Of the Candidate</h1>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Associate</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button>
                    <table class="table table-striped">
                        <thead>

                        <th>name</th>
                        <th>Phone number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        <tr>
                            <td>Name 1</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>Name 2</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>Name 3</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Promoters</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button>
                    <table class="table table-striped">
                        <thead>

                        <th>name</th>
                        <th>Phone number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        <tr>
                            <td>Name 1</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>Name 2</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        <tr>
                            <td>Name 3</td>
                            <td>045987878</td>
                            <td><a href="{{route('candidates.view')}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>







@endsection