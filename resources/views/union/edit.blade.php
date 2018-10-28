<form method="post" action="{{route('union.update',['id'=>$union->unionId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Union</label>
            <input type="text" name="unionName" placeholder="union name" class="form-control" value="{{$union->unionName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
