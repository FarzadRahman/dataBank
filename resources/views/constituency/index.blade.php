@extends('main')
@section('content')
@section('header')

    <!-- DataTables -->
    <link href="{{url('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
{{--    <link href="{{url('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">--}}


@endsection
    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal" id="voteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Voters</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="voteModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{--Centers--}}
    <div class="modal" id="centerModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Centers</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="centerModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 align="center">Constituency</h3>
            <i class="glyphicon glyphicon-chevron-right"></i>
        </div>

        <div class="card-body">
            <a href="{{route('constituency.add')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></a>
            <table class="table table-striped" id="datatable">
                <thead>
                    <th>number</th>
                    <th>name</th>
                    <th>area</th>
                    <th>division</th>
                    <th>voter</th>
                    <th>center</th>
                    <th>candidates</th>
                    <th>action</th>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>



@endsection
@section('foot-js')
    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    {{--<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>--}}
    {{--<script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>--}}
    <script>


        $(document).ready( function () {
            dataTable=  $('#datatable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(0)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                Filter: true,
                stateSave: true,
                ordering:false,
                type:"POST",
                "ajax":{
                    "url": "{!! route('constituency.getConstituencyData') !!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [
                    { data: 'number', name: 'constituency.number' },
                    { data: 'name', name: 'constituency.name' },
                    { data: 'area', name: 'constituency.area' },
                    { data: 'divisionName', name: 'division.divisionName' },
                    { "data": function(data){
                                return '<button type="button" class="btn btn-primary btn-sm" data-panel-id="'+data.constituencyId+'" onclick="getVoter(this)">' +
                                    data.totalVoter.getDigitBanglaFromEnglish() +
                                    '</button>';
                                },
                        "orderable": false, "searchable":false, "name":"selected_rows" },
                    { "data": function(data){
                            return '<button type="button" class="btn btn-primary btn-sm" data-panel-id="'+data.constituencyId+'"  onclick="centerModal(this)">' +
                                data.totalCenter.getDigitBanglaFromEnglish() +
                                '</button>';
                        },
                        "orderable": false, "searchable":false, "name":"selected_rows" },
                    { "data": function(data){
                            return '<button type="button" class="btn btn-primary btn-sm" data-panel-id="'+data.constituencyId+'" onclick="getCandidates(this)">' +
                                data.totalCandidate +
                                '</button>';

                        },
                        "orderable": false, "searchable":false, "name":"selected_rows" },
                    { "data": function(data){
                            return '<button type="button" class="btn btn-primary btn-sm"  data-panel-id="'+data.constituencyId+'" onclick="editConsitituency(this)">' +
                               'Edit'+
                                '</button>';
                        },
                        "orderable": false, "searchable":false, "name":"selected_rows" }
                ]
            }

            );

        } );
        var finalEnlishToBanglaNumber={'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        String.prototype.getDigitBanglaFromEnglish = function() {
            var retStr = this;
            for (var x in finalEnlishToBanglaNumber) {
                retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
            }
            return retStr;
        };

        function getVoter(x) {
            var id=$(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: "{!! route('constituency.getConstituencyVoter') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#voteModalBody").html(data);
                    $("#voteModal").modal();

                }
            });
        }
        function centerModal(x) {

            var id=$(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: "{!! route('center.getCenterModal') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#centerModalBody").html(data);
                    $("#centerModal").modal();

                }
            });
        }

        function editConsitituency(x) {
            var id=$(x).data('panel-id');
            let url = "{{ route('constituency.edit', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }
        function getCandidates(x) {
            var id=$(x).data('panel-id');
            let url = "{{ route('candidates.index', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }


    </script>
@endsection