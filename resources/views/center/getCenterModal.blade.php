<div class="modal" id="addCenterModal">
    <div class="modal-dialog" style="max-width: 70%;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Center</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="{{route('center.insert')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$consitituencyName->constituencyId}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Center Name</label>
                            <input type="text" class="form-control" name="centerName" placeholder="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Location</label>
                            <textarea class="form-control" name="location" placeholder="location" ></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Male Voter</label>
                            <input type="number" class="form-control" name="maleVoter" placeholder="male">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Female Voter</label>
                            <input type="number" class="form-control" name="femaleVoter" placeholder="female" >
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success btn-sm">Insert</button>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>



<h5 align="center">{{$consitituencyName->name}}</h5>
<button class="btn btn-info btn-sm pull-right" onclick="addCenter()"><i class="fa fa-plus"></i></button>
<table class="table">
    <thead>
    <th>Center Name</th>
    <th>Total Voter</th>
    </thead>
    <?php
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");


    ?>
{{--    {{str_replace($en,$bn,1)}}--}}
    <tbody>
        @foreach($centers as $center)
            <tr>
                <td>{{$center->centerName}}</td>
                <td>{{str_replace($en,$bn,$center->maleVoter+$center->femaleVoter)}}</td>
            </tr>
        @endforeach
    </tbody>
</table>



<script>
    function addCenter() {
        $("#addCenterModal").modal();
    }

</script>