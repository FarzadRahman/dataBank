@extends('main')
@section('content')
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    {{--Site Map--}}
    <a href="{{route('constituency.index')}}">Constituency</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('constituency.edit',['id'=>$getAssociatesDetails->constituencyId])}}">{{$getAssociatesDetails->constituencyName}}</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.index',['id'=>$getAssociatesDetails->constituencyId])}}">candidates</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.edit',['id'=>$getAssociatesDetails->candidateId])}}">{{$getAssociatesDetails->candidateName}}</a>
    <i class="fa fa-angle-double-right"></i>Associate :   {{$getAssociatesDetails->associateName}}


    <div class="col-md-12"> <br>

        <div class="card">
            <div class="card-header">
                <h3 class="pull-left">Details Of the Associate</h3>

                <div class="form-group pull-right">
                    <a href="{{route('associate.edit',$getAssociatesDetails->associateId)}}"><button class="btn btn-sm btn-info">Edit</button></a>
                    <button type="button" class="btn btn-default btn-sm"  onclick="printAssociate({{$getAssociatesDetails->associateId}})"><i class="fa fa-print"></i></button>
                </div>


            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            @if($getAssociatesDetails->image != null)
                                <div>
                                    <img style="width: 250px;height: 250px" src="{{url('public/associate/associateImages/thumb'."/".$getAssociatesDetails->image)}}">

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
                            {{$getAssociatesDetails->associateName}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number :</label>
                            {{$getAssociatesDetails->phoneNumber}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">party :</label>
                            {{$getAssociatesDetails->partyName}}
                        </div>
                    </div>






                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Remarks :</label>
                            {{$getAssociatesDetails->remark}}
                        </div>

                    </div>

                <hr>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Date of Birth :</label>
                            {{$getAssociatesDetails->dob}}
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Age :</label>
                            {{$getAssociatesDetails->age}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Gender :</label>
                            @foreach(GENDER as $key=>$value)
                                @if($getAssociatesDetails->gender==$value){{$key}}@endif
                            @endforeach

                        </div>
                   
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Blood Group :</label>
                            {{$getAssociatesDetails->bloodGroup}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">NID :</label>
                            {{$getAssociatesDetails->nid}}

                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4">NID :</label>
                            {{$getAssociatesDetails->nid}}

                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Marital :</label>
                            {{$getAssociatesDetails->marital}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Spouse :</label>
                            {{$getAssociatesDetails->spouse}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Spouse Number :</label>
                            {{$getAssociatesDetails->spouseNumber}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Father Name:</label>
                            {{$getAssociatesDetails->father}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother Name :</label>
                            {{$getAssociatesDetails->mother}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Mother Number :</label>
                            {{$getAssociatesDetails->motherNumber}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Religion :</label>
                            {{$getAssociatesDetails->religion}}

                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Occupation :</label>
                            {{$getAssociatesDetails->occupation}}

                        </div>




                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Address :</label>
                            {{$getAssociatesDetails->address}}
                        </div>

                    </div>




            </div>
        </div>

    </div>

        @if($getAssociatesDetails->profile != null)

            <div align="center"  >
                <div class="embed-responsive embed-responsive-4by3 col-md-6">
                    <iframe class="embed-responsive-item"   name="myiframe" id="myiframe" src="{{url('public/associate/profileDoc'."/".$getAssociatesDetails->profile)}}"></iframe>
                </div>
            </div>

        @endif






@endsection

@section('foot-js')
            <script>
                function printAssociate(x){
                    var id=x;
                    var url = "{{ route('pdf.getAssociate', ':id') }}";
                    url = url.replace(':id', id);
                    // document.location.href=url;
                    window.open(url,'_blank');

                }
            </script>


@endsection