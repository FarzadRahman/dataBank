@extends('main')
@section('content')
    <br class="mobile-break">
    <br class="mobile-break">
    <div class="card" style="margin-top: 5%">
        <div class="card-body">
            <div class="row" align="center">
                <div class="col-md-6">
                    <a href="{{route('constituency.index')}}" class="btn btn-sq-lg btn-primary" style="width: 100%;">
                        <i class="fa fa-user fa-5x"></i><br/>
                        Constituency <br>List
                    </a>
                    <div class="mobile-break">
                        <hr>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{route('party.index')}}" class="btn btn-sq-lg btn-info" style="width: 100%;">
                        <i class="fa fa-user fa-5x"></i><br/>
                        Commitee <br>List
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection