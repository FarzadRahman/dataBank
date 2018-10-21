@extends('main')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="pull-left">Details Of the Promoter</h3>
                <a href="{{route('promoter.edit',$getPromotersDetails->promotersId)}}"><button class="btn btn-smbtn-info pull-right">Edit</button></a>

            </div>
            <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name :</label>
                            {{$getPromotersDetails->promoterName}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number :</label>
                            {{$getPromotersDetails->phoneNumber}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">party :</label>
                            {{$getPromotersDetails->partyName}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Image :</label>
                            @if($getPromotersDetails->image != null)
                                <div>
                                    <img style="width: 150px;height: 100px" src="{{url('public/promoter/promoterImages/thumb'."/".$getPromotersDetails->image)}}">

                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Remarks :</label>
                            {{$getPromotersDetails->remark}}
                        </div>

                    </div>
                    <hr>
                @if($getPromotersDetails->profile == null)
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date of Birth :</label>
                            {{$getPromotersDetails->dob}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender :</label>
                            @foreach(GENDER as $key=>$value)
                                @if($getPromotersDetails->gender==$value){{$key}}@endif
                            @endforeach

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Blood Group :</label>
                            {{$getPromotersDetails->bloodGroup}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">NID :</label>
                            {{$getPromotersDetails->nid}}

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Address :</label>
                            {{$getPromotersDetails->address}}
                        </div>

                    </div>

                @else
                    <iframe width="100%"  name="myiframe" id="myiframe" src="{{url('public/candidate/profileDoc'."/".$getPromotersDetails->profile)}}"></iframe>
                @endif


            </div>
        </div>

    </div>






@endsection

@section('foot-js')


@endsection