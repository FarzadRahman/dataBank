@extends('main')
@section('content')

<!-- Button to Open the Modal -->



<div style=" margin: 0px; padding: 10px;">
    <br class="mobile-break">
    <br class="mobile-break">
    <br class="mobile-break">
    <div class="card">
        <div class="card-header">
            <h3 align="center">Candidates</h3>
            <i class="glyphicon glyphicon-chevron-right"></i>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="datatable">
                    <thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Party</th>
                    <th>Constituency</th>
                    <th>Associates</th>
                    <th>Promoters</th>
                    <th>action</th>
                    </thead>
                    <tbody>

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
                        "url": "{!! route('candidates.getAllCandidateData') !!}",
                        "type": "POST",
                        data:function (d){
                            d._token="{{csrf_token()}}";
                        },
                    },
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'phoneNumber', name: 'phoneNumber' },
                        { data: 'partyName', name: 'partyName' },
                        { data: 'constituencyName', name: 'constituencyName' },
                        { "data": function(data){
                                return data.totalAssociates.toString().getDigitBanglaFromEnglish() ;
                            },
                            "orderable": false, "searchable":false, "name":"selected_rows" },
                        { "data": function(data){
                            return data.totalPromoters.toString().getDigitBanglaFromEnglish() ;
                            },
                            "orderable": false, "searchable":false, "name":"selected_rows" },
                        {
                            "data": function (data) {
                                return ''+
                                    '&nbsp;<button class="btn btn-smbtn-info btn-sm" data-panel-id="'+data.candidateId+'" onclick="getCandidateData(this)"><i class="fa fa-edit"></i></button>'+
                                    '&nbsp;<button type="button" class="btn btn-danger btn-sm " data-panel-id="'+data.candidateId+'" onclick="deleteCandidate(this)"><i class="fa fa-trash"></i></button>' +
                                    '&nbsp;<button type="button" class="btn btn-default btn-sm " data-panel-id="'+data.candidateId+'" onclick="printCandidate(this)"><i class="fa fa-print"></i></button>'

                                    ;
                            },
                            "orderable": false, "searchable": false
                        },
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



        {{--function editConsitituency(x) {--}}
            {{--var id=$(x).data('panel-id');--}}
            {{--let url = "{{ route('constituency.edit', ':id') }}";--}}
            {{--url = url.replace(':id', id);--}}
            {{--document.location.href=url;--}}
        {{--}--}}

        function getCandidateData(x)
        {
            var id=$(x).data('panel-id');
            var url = "{{ route('candidates.edit', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;

        }

        function deleteCandidate(x){
            var id=$(x).data('panel-id');
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidates.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': id},
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
            // var id=$(x).data('panel-id');
            // pdf.index
            var id=$(x).data('panel-id');
            var url = "{{ route('pdf.index', ':id') }}";
            url = url.replace(':id', id);
            // document.location.href=url;
            window.open(url,'_blank');
            {{--$.ajax({--}}
                {{--type: 'POST',--}}
                {{--url: "{!! route('candidates.print') !!}",--}}
                {{--cache: false,--}}
                {{--data: {_token: "{{csrf_token()}}",'id': id},--}}
                {{--success: function (data) {--}}
                    {{--location.reload();--}}

                {{--}--}}
            {{--});--}}

        }



    </script>
@endsection