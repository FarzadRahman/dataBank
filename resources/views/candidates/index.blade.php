@extends('main')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="pull-left" align="center">Candidates</h3>
                <a href="{{route('candidates.add')}}"><button class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i></button></a>

            </div>
            <div class="card-body">
                <table id="manageapplication" class="table table-striped">
                    <thead>

                    <th>name</th>
                    <th>Phone number</th>
                    <th>Action</th>

                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>

    </div>





@endsection

@section('foot-js')
    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function() {


            table = $('#manageapplication').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax": {
                    "url": "{!! route('candidates.getData')!!}",
                    "type": "POST",
                    data: function (d) {

                        d._token = "{{csrf_token()}}";


                    },
                },
                columns: [

                    {data: 'name', name: 'name', "orderable": false, "searchable": true},

                    {data: 'phoneNumber', name: 'phoneNumber', "orderable": false, "searchable": true},


                    {
                        "data": function (data) {
                            return ''+
                                '&nbsp;<button class="btn btn-smbtn-info" data-panel-id="'+data.candidateId+'" onclick="getCandidateData(this)">Edit</button>'+
                                '&nbsp;<button type="button" class="btn btn-danger btn-sm " data-panel-id="'+data.candidateId+'" onclick="deleteCandidate(this)"><i class="fa fa-trash"></i></button>' +
                                '                                '
                                ;
                        },
                        "orderable": false, "searchable": false
                    },


                ],
            });
        });


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
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

    </script>



@endsection