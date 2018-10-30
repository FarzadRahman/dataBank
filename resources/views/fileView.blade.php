@if($file)
<div align="center" class="embed-responsive embed-responsive-4by3">

        @if($partyLevels==2)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/mohanogorfiles'."/".$file->image)}}"></iframe>
        @elseif($partyLevels ==1)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/jatiofiles'."/".$file->image)}}"></iframe>

        @elseif($partyLevels == 3)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/zilafiles'."/".$file->image)}}"></iframe>

        @elseif($partyLevels == 4)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/upzilafiles'."/".$file->image)}}"></iframe>

        @elseif($partyLevels == 5)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/pouroshovafies'."/".$file->image)}}"></iframe>

        @elseif($partyLevels == 6)
            <iframe class="embed-responsive-item"  name="myiframe" id="myiframe" src="{{url('public/unionfies'."/".$file->image)}}"></iframe>
        @endif

</div>
@else
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
        <div class="form-group col-md-12">

            <label class="col-md-2">Upload</label>
            <input type="file" id="uploadDoc" name="uploadDoc" accept="*" placeholder="Document" class="form-control col-md-8" />


        </div>


        <div class="form-group col-sm-12">
            <button class="btn btn-success">Submit</button>
        </div>


    </form>
@endif