<div class="row">
    <div class="form-group col-sm-4">
        <label>Male</label>
        <input class="form-control" value="{{$consitituency->maleVoter}}">
    </div>
    <div class="form-group col-sm-4">
        <label>Female</label>
        <input class="form-control" value="{{$consitituency->femaleVoter}}">
    </div>
    <div class="form-group col-sm-4">
        <label>Total</label>
        <input class="form-control" value="{{$consitituency->maleVoter+$consitituency->femaleVoter}}" readonly>
    </div>

</div>