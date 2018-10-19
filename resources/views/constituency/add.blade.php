@extends('main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 align="center">Add Constituency</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Constituency Number</label>
                    <input type="text" placeholder="number" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Constituency Name</label>
                    <input type="text" placeholder="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Constituency Area</label>
                    <textarea class="form-control" placeholder="area" rows="5"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Division</label>
                    <select class="form-control">
                        <option>Select Division</option>
                        <option>Dhaka</option>
                        <option>Rajshahi</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h5 align="center">Voter</h5>
                </div>
                <div class="form-group col-sm-4">
                    <label>Male</label>
                    <input class="form-control" value="800">
                </div>
                <div class="form-group col-sm-4">
                    <label>Female</label>
                    <input class="form-control" value="700">
                </div>

            </div>

        </div>
    </div>


@endsection
