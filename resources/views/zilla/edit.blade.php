<form method="post" action="{{route('zilla.update',['id'=>$zilla->zillaId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Zilla</label>
            <input type="text" name="zillaName" placeholder="zilla name" class="form-control" value="{{$zilla->zillaName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
