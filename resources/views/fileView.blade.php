@if($file)
<div align="center" class="embed-responsive embed-responsive-4by3">

        @if($partyLevels==2)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/mohanogorfiles'."/".$file->image)}}"></iframe>
        @elseif($partyLevels==1)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/jatiofiles'."/".$file->image)}}"></iframe>
        @endif

</div>
@else
    <form method="post" enctype="multipart/form-data" action="{{route('files.add')}}" accept-charset="utf-8">
        {{csrf_field()}}
        <input type="hidden" name="partyLevelId" value="{{$partyLevels}}">
        <input type="hidden" name="partyId" value="{{$partyId}}">
        <input type="hidden" name="listTypeId" value="{{$listType}}">
        <div class="form-group col-md-12">

            <label class="col-md-2">Upload</label>
            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Document" class="form-control col-md-8" />


        </div>


        <div class="form-group col-sm-12">
            <button class="btn btn-success">Submit</button>
        </div>


    </form>
@endif