<form method="post" action="{{route('party.update',['id'=>$party->divisionId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Party</label>
            <input type="text" name="divisionName" placeholder="division name" class="form-control" value="{{$party->partyName}}">
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
