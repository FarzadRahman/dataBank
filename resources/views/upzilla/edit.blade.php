<form method="post" action="{{route('upzilla.update',['id'=>$upzilla->upzillaId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Upzilla</label>
            <input type="text" name="upzillaName" placeholder="upzilla name" class="form-control" value="{{$upzilla->upzillaName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
