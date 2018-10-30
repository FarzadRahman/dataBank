@extends('main')
@section('content')
    Committee List <i class="fa fa-angle-double-right"></i> <a href="{{route('party.index')}}">{{$party->partyName}}</a>
    <i class="fa fa-angle-double-right"></i> Party-Level
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Party-Level</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('partylevel.insert')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Level Name</label>
                                <input type="text" name="name" placeholder="party level name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-success pull-right">Insert</button>
                            </div>

                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <!-- The Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Party-Level</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="editModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>



    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 align="center">{{$party->partyName}}</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-info pull-right"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></button>
                <div class="row">
                    <div class=" form-group  col-md-6">
                        <label>Party Level</label>
                        <select id="partyLevel" name="partyLevel" class="form-control">
                            <option selected value="">Select a Level</option>
                            @foreach($partyLevels as $pL)
                                <option value="{{$pL->party_levelId}}">{{$pL->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div style="display: none" id="zilaDiv" class="form-group col-md-6">
                        <label>Zila</label>
                        <select id="zila" name="zila" class="form-control">
                            <option selected value="">Select a Zila</option>
                            @foreach($allZila as $aZ)
                                <option value="{{$aZ->zillaId}}">{{$aZ->zillaName}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div style="display: none" id="ListDiv" class="form-group col-md-6">
                        <label>List Type</label>
                        <select id="listType" name="listType" class="form-control">
                            <option selected value="">Select a Type</option>
                            @foreach($listType as $lT)
                                <option value="{{$lT->listtypeId}}">{{$lT->typeName}}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
                <hr>

                <div style="display: none" class="card" align="center"  id="fileDiv">

                </div>




            </div>
        </div>
    </div>

@endsection
@section('foot-js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        function editPartyLevel(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('partylevel.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#editModalBody").html(data);
                    $('#editModal').modal();
                    // console.log(data);
                }
            });

        }
        function viewPartyLevel(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('partylevel.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'partyLevelId': id,'partyId':"{{$party->partyId}}"},
                success: function (data) {

                    // console.log(data);
                }
            });

        }

        $('#partyLevel').on('change', function() {

            var partyId="{{$party->partyId}}";

            if (this.value==2 || this.value==1){

                $("#ListDiv").show();
                $("#zilaDiv").hide();
                $("#zila").prop("selectedIndex", 0);


            }
            if(this.value==3){
                $("#ListDiv").hide();
                $("#listType").prop("selectedIndex", 0);
                $("#zilaDiv").show();
            }



        });
        $('#listType').on('change', function() {

            var partyId="{{$party->partyId}}";
            var partyLevelId=$("#partyLevel").val();
            // console.log(this.value);

            $.ajax({
                "type":'POST',
                "url":'{{route('getFileDivWithData')}}',

                {{--data:function (d) {--}}

                    {{--d._token = "{{csrf_token()}}";--}}
                    {{--d.partyId=partyId;--}}
                    {{--d.partyLevelId=partyLevelId;--}}
                    {{--d.listTypeId=this.value;--}}
                    {{--// d.listTypeId=this.value;--}}

                {{--},--}}

                data:{_token:"{{csrf_token()}}",partyId:partyId,partyLevelId:partyLevelId,listTypeId:this.value},
                {{--cache: false,--}}
                success:function(data) {
                    console.log(data);
                    document.getElementById("fileDiv").innerHTML = data;
                    $("#fileDiv").show();


                }
            });

        });
        $('#zila').on('change', function() {

            $("#ListDiv").show();

        });

    </script>

@endsection