@extends('main')
@section('content')
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    {{--Site Map--}}
    <a href="{{route('constituency.index')}}">Constituency</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('constituency.edit',['id'=>$getPromotersDetails->constituencyId])}}">{{$getPromotersDetails->constituencyName}}</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.index',['id'=>$getPromotersDetails->constituencyId])}}">candidates</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.edit',['id'=>$getPromotersDetails->candidateId])}}">{{$getPromotersDetails->candidateName}}</a>
    <i class="fa fa-angle-double-right"></i>
    Promoter :   {{$getPromotersDetails->promoterName}}
    

        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="pull-left">Details Of the Promoter</h3>
                <div class="form-group pull-right">
                    <a href="{{route('promoter.edit',$getPromotersDetails->promotersId)}}"><button class="btn btn-sm btn-info ">Edit</button></a>
                    <button type="button" class="btn btn-default btn-sm"  onclick="printPromoters({{$getPromotersDetails->promotersId}})"><i class="fa fa-print"></i></button>

                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            @if($getPromotersDetails->image != null)
                                <div>
                                    <img style="width: 250px;height: 250px" src="{{url('public/promoter/promoterImages/thumb'."/".$getPromotersDetails->image)}}">

                                </div>
                            @else
                                <label for="inputEmail4">Image : NA</label>
                            @endif
                        </div>


                    </div>

                </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name :</label>
                            {{$getPromotersDetails->promoterName}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number :</label>
                            {{$getPromotersDetails->phoneNumber}}
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">party :</label>
                            {{$getPromotersDetails->partyName}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Remarks :</label>
                            {{$getPromotersDetails->remark}}
                        </div>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date of Birth :</label>
                            {{$getPromotersDetails->dob}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Age :</label>
                            {{$getPromotersDetails->age}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender :</label>
                            @foreach(GENDER as $key=>$value)
                                @if($getPromotersDetails->gender==$value){{$key}}@endif
                            @endforeach

                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Blood Group :</label>
                            {{$getPromotersDetails->bloodGroup}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">NID :</label>
                            {{$getPromotersDetails->nid}}

                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Marital :</label>
                            {{$getPromotersDetails->marital}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Spouse :</label>
                            {{$getPromotersDetails->spouse}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Spouse Number :</label>
                            {{$getPromotersDetails->spouseNumber}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name:</label>
                            {{$getPromotersDetails->father}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother Name :</label>
                            {{$getPromotersDetails->mother}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother Number :</label>
                            {{$getPromotersDetails->motherNumber}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Religion :</label>
                            {{$getPromotersDetails->religion}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Occupation :</label>
                            {{$getPromotersDetails->occupation}}

                        </div>



                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Address :</label>
                            {{$getPromotersDetails->address}}
                        </div>

                    </div>









            </div>




    @if($getPromotersDetails->profile != null)

    <div align="center"  >
        <div class="embed-responsive embed-responsive-4by3 col-md-6">
            <iframe class="embed-responsive-item"   name="myiframe" id="myiframe" src="{{url('public/promoter/profileDoc'."/".$getPromotersDetails->profile)}}"></iframe>
        </div>
    </div>

    @endif




@endsection

@section('foot-js')
    <script>
        function printPromoters(x){
            var id=x;
            var url = "{{ route('pdf.getPromoter', ':id') }}";
            url = url.replace(':id', id);
            // document.location.href=url;
            window.open(url,'_blank');

        }
    </script>


@endsection