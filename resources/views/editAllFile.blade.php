<form method="post" action="{{route('updateAllFile')}}">
	{{csrf_field()}}
	<input type="hidden" name="id" value="{{$jation->allfileId}}">
	<div class="row">
		<div class="form-group col-md-6">
			<label>Name</label>
			<input type="text" value="{{$jation->name}}" class="form-control" name="name" required>
		</div>
		<div class="form-group col-md-6">
			<label>Remark</label>
			<input type="text" value="{{$jation->remark}}" class="form-control" name="remark">
			
		</div>
		<div class="form-group col-md-6">
			<button type="submit" class="btn btn-sm btn-success">Update</button>
			
		</div>
	</div>
	
</form>