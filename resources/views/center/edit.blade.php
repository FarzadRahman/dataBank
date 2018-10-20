<form method="post" action="{{route('center.update',['id'=>$center->centerId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Center Name</label>
            <input type="text" class="form-control" name="centerName" value="{{$center->centerName}}" required>
        </div>
        <div class="form-group col-md-6">
            <label>Location</label>
            <textarea class="form-control" name="location">{{$center->location}}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label>Male Voter</label>
            <input type="text" class="form-control" name="maleVoter" value="{{$center->maleVoter}}">
        </div>
        <div class="form-group col-md-6">
            <label>Female Voter</label>
            <input type="text" class="form-control" name="femaleVoter" value="{{$center->femaleVoter}}">
        </div>
        <div class="col-md-12">
            <button class="btn btn-success btn-sm">Update</button>
        </div>
    </div>
</form>