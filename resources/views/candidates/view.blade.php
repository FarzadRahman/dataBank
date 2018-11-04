@extends('main')
@section('content')
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    {{--Site Map--}}
    <a href="{{route('constituency.index')}}">Constituency</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('constituency.edit',['id'=>$getCandidatesDetails->constituencyId])}}">{{$getCandidatesDetails->constituencyName}}</a>
    <i class="fa fa-angle-double-right"></i>
    <a href="{{route('candidates.index',['id'=>$getCandidatesDetails->constituencyId])}}">candidates</a>
    <i class="fa fa-angle-double-right"></i> {{$getCandidatesDetails->CandidateName}}

    <br>
    <br>

    <?php
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");


    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="pull-left">Details Of the Candidate</h3>

                    <div class="form-group pull-right">
                        <a href="{{route('candidates.editView',$getCandidatesDetails->candidateId)}}"><button class="btn btn-sm btn-info ">Edit</button></a>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-default btn-sm"  onclick="printCandidate({{$getCandidatesDetails->candidateId}})"><i class="fa fa-print"></i></button>
                      @if($getCandidatesDetails->attachment)
                        <a href="{{url('public/candidate/attachment/'.$getCandidatesDetails->attachment)}}" type="button" class="btn btn-default btn-sm" download ><i class="fa fa-download"></i></a>
                      @endif
                    </div>


                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group">

                                @if($getCandidatesDetails->image != null)
                                    <div>
                                        <img style="width: 250px;height: 250px" src="{{url('public/candidate/candidateImages/thumb'."/".$getCandidatesDetails->image)}}">

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
                            {{$getCandidatesDetails->CandidateName}}
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number :</label>
                            {{$getCandidatesDetails->phoneNumber}}
                        </div>
                    </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Party :</label>
                                {{$getCandidatesDetails->partyName}}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Constituency :</label>
                                {{$getCandidatesDetails->constituencyName}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Remarks :</label>
                                {{$getCandidatesDetails->remark}}
                            </div>

                        </div>

                    <hr>

                    {{--@if($getCandidatesDetails->profile == null)--}}

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Date Of Birth :</label>
                                {{$getCandidatesDetails->dob}}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Age :</label>
                                {{$getCandidatesDetails->age}}
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Gender :</label>
                                @foreach(GENDER as $key=>$value)
                                    @if($getCandidatesDetails->gender==$value){{$key}}@endif
                                @endforeach

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Blood Group :</label>
                                {{$getCandidatesDetails->bloodGroup}}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">NID :</label>
                                {{$getCandidatesDetails->nid}}

                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Marital :</label>
                                {{$getCandidatesDetails->marital}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Spouse :</label>
                                {{$getCandidatesDetails->spouse}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Spouse Number :</label>
                                {{$getCandidatesDetails->spouseNumber}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Father Name:</label>
                                {{$getCandidatesDetails->father}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Mother Name :</label>
                                {{$getCandidatesDetails->mother}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Mother Number :</label>
                                {{$getCandidatesDetails->motherNumber}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Religion :</label>
                                {{$getCandidatesDetails->religion}}

                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Occupation :</label>
                                {{$getCandidatesDetails->occupation}}

                            </div>


                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Address :</label>
                                {{$getCandidatesDetails->address}}
                            </div>

                        </div>

                        {{--@endif--}}



                </div>
            </div>
            <br>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class=" pull-left" align="center">Associate</h3>
                    <a href="{{route('associate.add',$getCandidatesDetails->candidateId)}}"><button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button></a>
                </div>
                <div class="card-body">

                    <table id="" class="table table-striped manageapplication">
                        <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        <?php
                            $sl=0;
                        ?>
                        @foreach($getAllAssociate as $associate)
                            <tr>
                                <td>{{str_replace($en,$bn,++$sl)}}</td>
                                <td>
                                    {{$associate->name}}
                                </td>
                                <td>
                                    {{$associate->phoneNumber}}
                                </td>
                                <td><a href="{{route('associate.view',$associate->associateId)}}" class="btn btn-info btn-sm">View</a>
                                    @if(Auth::user()->userTypeId=='admin')
                                    <button type="button" class="btn btn-danger btn-sm " onclick="deleteAssociate({{$associate->associateId}})"><i class="fa fa-trash"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-default btn-sm"  onclick="printAssociate({{$associate->associateId}})"><i class="fa fa-print"></i></button>
                                    @if($associate->attachment)
                                    <a href="{{url('public/associate/attachment/'.$getCandidatesDetails->attachment)}}"download ><button class="btn btn-default btn-sm"><i class="fa fa-download"></i></button></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="pull-left" align="center">Promoters</h3>
                    <a href="{{route('promoter.add',$getCandidatesDetails->candidateId)}}"><button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button></a>
                </div>
                <div class="card-body">

                    <table id="" class="table table-striped manageapplication">
                        <thead>
                         <th>SL</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        <?php
                        $sl=0;
                        ?>
                        @foreach($getPromoters as $promoters)
                            <tr>
                                <td>{{str_replace($en,$bn,++$sl)}}</td>
                                <td>
                                    {{$promoters->name}}
                                </td>
                                <td>
                                    {{$promoters->phoneNumber}}
                                </td>
                                <td><a href="{{route('promoter.view',$promoters->promotersId)}}" class="btn btn-info btn-sm">View</a>
                                    @if(Auth::user()->userTypeId=='admin')
                                    <button type="button" class="btn btn-danger btn-sm " onclick="deletePromoter({{$promoters->promotersId}})"><i class="fa fa-trash"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-default btn-sm"  onclick="printPromoters({{$promoters->promotersId}})"><i class="fa fa-print"></i></button>
                                   @if($promoters->attachment)
                                    <a href="{{url('public/promoter/attachment/'.$promoters->attachment)}}"download ><button class="btn btn-default btn-sm"><i class="fa fa-download"></i></button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>
<br><br>
    @if($getCandidatesDetails->profile != null)
        <div align="center"  >
            <div class="embed-responsive embed-responsive-4by3 col-md-6">
            <iframe class="embed-responsive-item"   name="myiframe" id="myiframe" src="{{url('public/candidate/profileDoc'."/".$getCandidatesDetails->profile)}}"></iframe>
            </div>
        </div>
    @endif







@endsection

@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script>
        $(document).ready(function() {
            $('table.manageapplication').DataTable(

                {
                    "ordering": false

                }
            );
        } );
        function deleteAssociate(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('associate.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': x},
                            success: function (data) {
                                location.reload();

                            }
                        });
                    },
                    cancel: function () {
//                        $.alert('Canceled!');
                    }

                }
            });

        }
        function deletePromoter(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('promoter.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': x},
                            success: function (data) {
                                location.reload();

                            }
                        });
                    },
                    cancel: function () {
//                        $.alert('Canceled!');
                    }

                }
            });

        }

        function printCandidate(x){
            var id=x;
            var url = "{{ route('pdf.index', ':id') }}";
            url = url.replace(':id', id);
            // document.location.href=url;
            window.open(url,'_blank');

        }

        function printAssociate(x){
            var id=x;
            var url = "{{ route('pdf.getAssociate', ':id') }}";
            url = url.replace(':id', id);
            // document.location.href=url;
            window.open(url,'_blank');
        }
        function printPromoters(x){
            var id=x;
            var url = "{{ route('pdf.getPromoter', ':id') }}";
            url = url.replace(':id', id);
            // document.location.href=url;
            window.open(url,'_blank');

        }
    </script>

@endsection