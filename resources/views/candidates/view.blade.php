@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="pull-left">Details Of the Candidate</h3>
                    <a href="{{route('candidates.editView',$getCandidatesDetails->candidateId)}}"><button class="btn btn-smbtn-info pull-right">Edit</button></a>

                </div>
                <div class="card-body">
                @if($getCandidatesDetails->profile == null)
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
                                <label for="inputEmail4">party :</label>
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
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Image :</label>
                                @if($getCandidatesDetails->image != null)
                                    <div>
                                        <img style="width: 150px;height: 100px" src="{{url('public/candidate/candidateImages/thumb'."/".$getCandidatesDetails->image)}}">

                                    </div>
                                @endif
                            </div>


                        </div>
                    @else
                        <iframe width="100%"  name="myiframe" id="myiframe" src="{{url('public/candidate/profileDoc'."/".$getCandidatesDetails->profile)}}"></iframe>
                    @endif


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

                        <th>name</th>
                        <th>Phone number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        @foreach($getAllAssociate as $associate)
                            <tr>
                                <td>
                                    {{$associate->name}}
                                </td>
                                <td>
                                    {{$associate->phoneNumber}}
                                </td>
                                <td><a href="{{route('associate.view',$associate->associateId)}}" class="btn btn-info btn-sm">View</a>
                                    <button type="button" class="btn btn-danger btn-sm " onclick="deleteAssociate({{$associate->associateId}})"><i class="fa fa-trash"></i></button>
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

                        <th>name</th>
                        <th>Phone number</th>
                        <th>Action</th>

                        </thead>
                        <tbody>
                        @foreach($getPromoters as $promoters)
                            <tr>
                                <td>
                                    {{$promoters->name}}
                                </td>
                                <td>
                                    {{$promoters->phoneNumber}}
                                </td>
                                <td><a href="{{route('promoter.view',$promoters->promotersId)}}" class="btn btn-info btn-sm">View</a>
                                    <button type="button" class="btn btn-danger btn-sm " onclick="deletePromoter({{$promoters->promotersId}})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>







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
    </script>

@endsection