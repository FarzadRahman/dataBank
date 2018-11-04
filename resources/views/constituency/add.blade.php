@extends('main')
@section('content')
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    {{--Site Map--}}
    <div class="card">
        <div class="card-header">
            <h4 align="center">Add Constituency</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('constituency.insert')}}" accept-charset="utf-8">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Constituency Number</label>
                        <input type="text" name="number" placeholder="number" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Constituency Name</label>
                        <input type="text" name="name" placeholder="name" class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Constituency Area</label>
                        <textarea name="area" class="form-control" placeholder="area" rows="5" ></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Division</label>
                        <select class="form-control" name="divisionId" >
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{$division->divisionId}}">{{$division->divisionName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h5 align="center">Voter</h5>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Male</label>
                        <input class="form-control" name="maleVoter" type="number" >
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Female</label>
                        <input class="form-control" name="femaleVoter" type="number" >
                    </div>
                    <div class="form-group col-sm-12">
                    <button class="btn btn-success pull-right">Insert</button>
                    </div>

                </div>
            </form>


        </div>
    </div>


@endsection
