<form method="post" action="{{route('partylevel.update')}}">
    <input type="hidden" name="id" value="{{$partyLevels->party_levelId}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Level Name</label>
            <input type="text" name="name" value="{{$partyLevels->name}}" placeholder="party level name" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Insert</button>
        </div>

    </div>
</form>