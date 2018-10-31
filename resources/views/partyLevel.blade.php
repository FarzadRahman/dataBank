@extends('main')
@section('header')
    <link href="{{url('public/src/selectstyle.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <br class="mobile-break"><br class="mobile-break"><br class="mobile-break">
    Committee List <i class="fa fa-angle-double-right"></i> <a href="{{route('party.index')}}">{{$party->partyName}}</a>
    <i class="fa fa-angle-double-right"></i> Party-Level

    <br>
    <br>
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
                        <select id="zila" name="zila"  class="form-control" >
                            <option selected value="">Select a Zila</option>
                            @foreach($allZila as $aZ)
                                <option value="{{$aZ->zillaId}}">{{$aZ->zillaName}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div style="display: none" id="upZillaDiv" class="form-group col-md-6">
                        <label>UpZila</label>

                        <select id="upzilla" name="upzilla" class="form-control" class="form-control">
                            <option selected value="">Select a Upzila</option>
                            @foreach($allupZila as $aUZ)
                                <option value="{{$aUZ->upzillaId}}">{{$aUZ->upzillaName	}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div style="display: none" id="pouroshovaDiv" class="form-group col-md-6">
                        <label>Pouroshova</label>

                        <select id="pouroshova" name="pouroshova" class="form-control">
                            <option selected value="">Select a pouroshova</option>
                            @foreach($allPouroshova as $aPouroshova)
                                <option value="{{$aPouroshova->pouroshovaId}}">{{$aPouroshova->pouroshovaName	}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div style="display: none" id="unionDiv" class="form-group col-md-6">
                        <label>Union</label>
                        <select id="union" name="union" class="form-control" >
                            <option selected value="">Select a union</option>
                            @foreach($allUnion as $aunion)
                                <option value="{{$aunion->unionId}}">{{$aunion->unionName	}}</option>
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
                @if (session('data'))
                    <div class="alert alert-success">
                        {{session('data["partyLevels"]')}}
                    </div>
                @endif
                <hr>

                <div style="display: none" class="card" align="center"  id="fileDiv">

                </div>




            </div>
        </div>
    </div>

@endsection
@section('foot-js')
    <script src="{{url('public/src/selectstyle.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        jQuery(document).ready(function($) {
            // $('#zila').select2({
            //     onchange : function(val){}
            // });
            // $('#zila').selectstyle({
            //     width  : 400,
            //     height : 300,
            //     theme  : 'light',
            //     onchange : function(val){}
            // });
            // $('#upzilla').selectstyle({
            //     width  : 400,
            //     height : 300,
            //     theme  : 'light',
            //     onchange : function(val){}
            // });
            // $('#pouroshova').selectstyle({
            //     width  : 400,
            //     height : 300,
            //     theme  : 'light',
            //     onchange : function(val){}
            // });
            // $('#union').selectstyle({
            //     width  : 400,
            //     height : 300,
            //     theme  : 'light',
            //     onchange : function(val){}
            // });


        });

        jQuery(document).ready(function($) {

            @if(Session::has('partyLevels'))
                var partyLevel= "{{ Session::get('partyLevels') }}";
                var listType="{{ Session::get('listType') }}";
                $('#partyLevel').val(partyLevel);
                // paremeter
                var data={};
                var partyId="{{$party->partyId}}";
                data['partyId']=partyId;
                data['partyLevelId']=partyLevel;
                data['listTypeId']=listType;








                if(partyLevel==1){
                    $("#ListDiv").show();
                    $('#listType').val(listType);

                }

                else if(partyLevel==2){
                    $("#ListDiv").show();
                    $('#listType').val(listType);
                }
                else if(partyLevel==3){
                    var zillaId="{{ Session::get('zillaId') }}";

                    $("#ListDiv").show();
                    $('#listType').val(listType);
                    $("#zilaDiv").show();
                    $('#zila').val(zillaId);

                    data['zilaId']=zillaId;

                }
                else if(partyLevel==4){
                    var upzilaId="{{ Session::get('upzilaId') }}";
                    $("#ListDiv").show();
                    $('#listType').val(listType);

                    $("#upZillaDiv").show();
                    $('#upzilla').val(upzilaId);

                    data['upzillaId']=upzilaId;
                }
                else if(partyLevel==5){
                    var pouroshovaId="{{ Session::get('pouroshovaId') }}";
                    $("#ListDiv").show();
                    $('#listType').val(listType);

                    $("#pouroshovaDiv").show();
                    $('#pouroshova').val(pouroshovaId);

                    data['pouroshovaId']=pouroshovaId;
                }
                else if(partyLevel==6){
                    var unionId="{{ Session::get('unionId') }}";
                    $("#ListDiv").show();
                    $('#listType').val(listType);

                    $("#unionDiv").show();
                    $('#union').val(unionId);


                    data['unionId']=unionId;
                }

            $.ajax({
                type: 'POST',
                url: '{{route('getFileDivWithData')}}',
                data: {_token: "{{csrf_token()}}", Alldata: data},
                cache: false,
                success: function (data) {
                    document.getElementById("fileDiv").innerHTML = data;
                    $("#fileDiv").show();
                }
            });


            @endif

        });

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
            $("#fileDiv").hide();

            if (this.value==2 || this.value==1){

                $("#ListDiv").show();
                $("#zilaDiv").hide();
                $("#zila").prop("selectedIndex", 0);
                $("#upZillaDiv").hide();
                $("#upzilla").prop("selectedIndex", 0);
                $("#pouroshovaDiv").hide();
                $("#pouroshova").prop("selectedIndex", 0);
                $("#unionDiv").hide();
                $("#union").prop("selectedIndex", 0);


            }
            if(this.value==3){
                $("#ListDiv").hide();
                $("#listType").prop("selectedIndex", 0);

                $("#unionDiv").hide();
                $("#pouroshovaDiv").hide();
                $("#upZillaDiv").hide();

                $("#zilaDiv").show();
            }
            if(this.value==4){
                $("#ListDiv").hide();
                $("#listType").prop("selectedIndex", 0);
                $("#zilaDiv").hide();
                $("#zila").prop("selectedIndex", 0);

                $("#unionDiv").hide();
                $("#pouroshovaDiv").hide();

                $("#upZillaDiv").show();

            }
            if(this.value==5){
                $("#ListDiv").hide();
                $("#listType").prop("selectedIndex", 0);
                $("#zilaDiv").hide();
                $("#zila").prop("selectedIndex", 0);
                $("#upZillaDiv").hide();
                $("#upzilla").prop("selectedIndex", 0);
                $("#unionDiv").hide();
                $("#pouroshovaDiv").show();

            }
            if(this.value==6){
                $("#ListDiv").hide();
                $("#listType").prop("selectedIndex", 0);
                $("#zilaDiv").hide();
                $("#zila").prop("selectedIndex", 0);
                $("#upZillaDiv").hide();
                $("#upzilla").prop("selectedIndex", 0);
                $("#pouroshovaDiv").hide();
                $("#pouroshova").prop("selectedIndex", 0);
                $("#unionDiv").show();


            }



        });
        $('#listType').on('change', function() {

            var partyId="{{$party->partyId}}";
            var partyLevelId=$("#partyLevel").val();

            var data={};
            data['partyId']=partyId;
            data['partyLevelId']=partyLevelId;
            data['listTypeId']=this.value;

            if (partyLevelId==3){
                data['zilaId']=$("#zila").val();
            }
            if (partyLevelId==4){
                data['upzillaId']=$("#upzilla").val();
            }
            if (partyLevelId==5){
                data['pouroshovaId']=$("#pouroshova").val();
            }
            if (partyLevelId==6){
                data['unionId']=$("#union").val();
            }



            if($('#listType').val()==""){
                $("#fileDiv").hide();
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: '{{route('getFileDivWithData')}}',
                    data: {_token: "{{csrf_token()}}", Alldata: data},
                    cache: false,
                    success: function (data) {
                        document.getElementById("fileDiv").innerHTML = data;
                        $("#fileDiv").show();
                    }
                });
            }

        });
        $('#zila').on('change', function() {

            $("#ListDiv").show();
        });
        $('#upzilla').on('change', function() {

            $("#ListDiv").show();

        });
        $('#pouroshova').on('change', function() {

            $("#ListDiv").show();

        });
        $('#union').on('change', function() {

            $("#ListDiv").show();

        });

        function addFile() {
            var partyId="{{$party->partyId}}";
            $.ajax({
                type:'POST',
                url:'{{route('committeeFile.modal')}}',

                data:{_token:"{{csrf_token()}}",partyId:partyId},
                cache: false,
                success:function(data) {
                    console.log(data);

                }
            });

        }

        {{--$(document).ready(function(){--}}
        {{--if('{{session()->get('data')}}'){--}}

        {{--$("#partyLevel").val("{{session()->get('data["partyLevels"]')}}");--}}


        {{--}--}}

        {{--});--}}

    </script>

@endsection