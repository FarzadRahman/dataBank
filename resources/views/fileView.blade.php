
<form method="post" enctype="multipart/form-data" action="{{route('files.add')}}" accept-charset="utf-8">
    {{csrf_field()}}
    <input type="hidden" name="partyLevelId" value="{{$partyLevels}}">
    <input type="hidden" name="partyId" value="{{$partyId}}">
    <input type="hidden" name="listTypeId" value="{{$listType}}">
    @if($partyLevels==3)
        <input type="hidden" name="zilaId" value="{{$zilaId}}">
    @endif
    @if($partyLevels==4)
        <input type="hidden" name="upZillaId" value="{{$upzillaId}}">
    @endif
    @if($partyLevels==5)
        <input type="hidden" name="pouroshovaFileId" value="{{$pouroshovaId}}">
    @endif
    @if($partyLevels==6)
        <input type="hidden" name="unionFileId" value="{{$unionId}}">
    @endif
    <div class="row">

        <div class="col-md-6">

            <label class="col-md-2">Name</label>
            <input type="text" id="uploadDocName" name="uploadDocName"  class="form-control col-md-8" required/>

        </div>
        <div class="col-md-6">

            <label class="col-md-2">Upload</label>
            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Document" class="form-control col-md-8" required/>


        </div>

        <div class="col-md-12">
            <button class="btn btn-success">Submit</button>
        </div>

    </div>






</form>
<hr>
<div align="center" class="table-responsive">

    <table class="table" id="datatable">
        <thead>

        <th style="text-align: center">Name</th>
        <th style="text-align: center">Action</th>

        </thead>
        <tbody>

        @if($partyLevels==2)


            @foreach($file as $f)
                <tr>

                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/mohanogorfiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deleteMohanogorFile({{$f->mohanogorId}})">delete</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        @elseif($partyLevels ==1)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)

                <tr>
                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/jatiofiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deleteJatioFile({{$f->jatiofileId}})">delete</button>
                        @endif
                    </td>
                <tr>
            @endforeach
        @elseif($partyLevels == 3)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/zilafiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deleteZillaFile({{$f->zillafileId}})">delete</button>
                        @endif

                    </td>
                <tr>
            @endforeach
        @elseif($partyLevels == 4)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/upzilafiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deleteUpZillaFile({{$f->upzillaId}})">delete</button>
                        @endif
                    </td>
                <tr>
            @endforeach
        @elseif($partyLevels == 5)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr >
                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/pouroshovafies'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deletePouroshovaFile({{$f->pouroshovafileId}})">delete</button>
                        @endif
                    </td>
                <tr>
            @endforeach
        @elseif($partyLevels == 6)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}
            @foreach($file as $f)
                <tr>
                    <td style="text-align: center">{{$f->name}}</td>
                    <td style="text-align: center">
                        <a href="{{url('public/unionfies'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a>
                        @if(Auth::user()->userTypeId=='admin')
                            <button class="btn btn-danger btn-sm" onclick="deleteUnionFile({{$f->unionfileId}})">delete</button>
                        @endif

                    </td>
                <tr>
            @endforeach
        @endif
        </tbody>
    </table>


</div>
<script>
    $(function() {
        // $('#datatable').DataTable();
    });


    function deleteJatioFile(id) {
        $.confirm({
            title: 'Delete!',
            content: 'Are you sure ?',
            buttons: {
                confirm: function () {

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('deleteJatioFile') !!}",
                        cache: false,
                        data: {_token: "{{csrf_token()}}",'id': id},
                        success: function (data) {
                            location.reload();
                            // console.log(data);
                        }
                    });

                },
                cancel: function () {

                }

            }
        });


    }
    function deleteMohanogorFile(id) {
        // alert(id);
        $.confirm({
            title: 'Delete!',
            content: 'Are you sure ?',
            buttons: {
                confirm: function () {
        $.ajax({
            type: 'POST',
            url: "{!! route('deleteMohanogorFile') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
                location.reload();
                // console.log(data);
            }
        }); },
                cancel: function () {

                }

            }
        });

    }

    function deleteZillaFile(id) {
        // alert(id);
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
        $.ajax({
            type: 'POST',
            url: "{!! route('deleteZillaFile') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
                location.reload();
                // console.log(data);
            }
        }); },
                    cancel: function () {

                    }

                }
            });
    }

    function deleteUpZillaFile(id) {
        // alert(id);
                $.confirm({
                    title: 'Delete!',
                    content: 'Are you sure ?',
                    buttons: {
                        confirm: function () {
        $.ajax({
            type: 'POST',
            url: "{!! route('deleteUpZillaFile') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
                location.reload();
            }
        }); },
                        cancel: function () {

                        }

                    }
                });
    }
    function deletePouroshovaFile(id) {
        // alert(id);
        {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: "{!! route('deletePouroshovaFile') !!}",--}}
            {{--cache: false,--}}
            {{--data: {_token: "{{csrf_token()}}",'id': id},--}}
            {{--success: function (data) {--}}
                {{--location.reload();--}}
            {{--}--}}
        {{--});--}}
    }
    function deleteUnionFile(id) {
        // alert(id);
        $.confirm({
            title: 'Delete!',
            content: 'Are you sure ?',
            buttons: {
                confirm: function () {
        $.ajax({
            type: 'POST',
            url: "{!! route('deleteUnionFile') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
                location.reload();
            }
        }); },
                cancel: function () {

                }

            }
        });
    }
</script>



