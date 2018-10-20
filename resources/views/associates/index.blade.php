@extends('main')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="pull-left">Details Of the Associate</h3>
                <a href="{{route('associate.edit',$getAssociatesDetails->associateId)}}"><button class="btn btn-smbtn-info pull-right">Edit</button></a>
            </div>
            <div class="card-body">
                @if($getAssociatesDetails->profile == null)
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name :</label>
                            {{$getAssociatesDetails->associateName}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number :</label>
                            {{$getAssociatesDetails->phoneNumber}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">party :</label>
                            {{$getAssociatesDetails->partyName}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Image :</label>
                            @if($getAssociatesDetails->image != null)
                                <div>
                                    <img style="width: 150px;height: 100px" src="{{url('public/associate/associateImages/thumb'."/".$getAssociatesDetails->image)}}">

                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Remarks :</label>
                            {{$getAssociatesDetails->remark}}
                        </div>

                    </div>

                @else
                    <iframe width="100%"  name="myiframe" id="myiframe" src="{{url('public/associate/profileDoc'."/".$getAssociatesDetails->profile)}}"></iframe>
                @endif

            </div>
        </div>

    </div>






@endsection

@section('foot-js')


@endsection