<form method="post" action="{{route('pouroshova.update',['id'=>$pouroshova->pouroshovaId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Pouroshova</label>
            <input type="text" name="pouroshovaName" placeholder="pouroshova name" class="form-control" value="{{$pouroshova->pouroshovaName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
