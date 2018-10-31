
<div align="center" class="table-responsive">
    {{--{{$file}}<br>--}}
    {{--{{$partyLevels}}--}}
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>

     @if($partyLevels==2)


         @foreach($file as $f)
             <tr>
             <td>{{$f->name}}</td>
             <td><a href="{{url('public/mohanogorfiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
             </tr>
         @endforeach
    @elseif($partyLevels ==1)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                <td>{{$f->name}}</td>
                <td><a href="{{url('public/jatiofiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
                <tr>
            @endforeach
     @elseif($partyLevels == 3)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                <td>{{$f->name}}</td>
                <td><a href="{{url('public/zilafiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
                <tr>
                    @endforeach
     @elseif($partyLevels == 4)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                <td>{{$f->name}}</td>
                <td><a href="{{url('public/upzilafiles'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
                <tr>
                    @endforeach
     @elseif($partyLevels == 5)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}

            @foreach($file as $f)
                <tr>
                <td>{{$f->name}}</td>
                <td><a href="{{url('public/pouroshovafies'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
                <tr>
                    @endforeach
     @elseif($partyLevels == 6)
            {{--<iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src=""></iframe>--}}
            @foreach($file as $f)
                <tr>
                <td>{{$f->name}}</td>
                <td><a href="{{url('public/unionfies'."/".$f->image)}}" class="btn btn-sm btn-sm" download>Download</a></td>
                <tr>
            @endforeach
     @endif
        </tbody>
    </table>
    <hr>

</div>

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
            <input type="text" name="unionFileId" value="{{$unionId}}">
        @endif
        <div class="row">

            <div class="col-md-6">

                <label class="col-md-2">Name</label>
                <input type="text" id="uploadDocName" name="uploadDocName"  class="form-control col-md-8" />

            </div>
            <div class="col-md-6">

                <label class="col-md-2">Upload</label>
                <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Document" class="form-control col-md-8" />


            </div>

            <div class="col-md-12">
                <button class="btn btn-success">Submit</button>
            </div>

        </div>






    </form>
