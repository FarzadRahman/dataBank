@extends('main')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 align="center">Candidates</h3>
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





@endsection