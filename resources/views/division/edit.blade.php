<form method="post" action="{{route('division.update',['id'=>$division->divisionId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Division</label>
            <input type="text" name="divisionName" placeholder="division name" class="form-control" value="{{$division->divisionName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
