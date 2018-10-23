<?php
$bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
$en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");


?>
{{--    {{str_replace($en,$bn,1)}}--}}
<div class="row">
    <div class="form-group col-sm-4">
        <label>Male</label>
        <input class="form-control" value="{{str_replace($en,$bn,$consitituency->maleVoter)}}">
    </div>
    <div class="form-group col-sm-4">
        <label>Female</label>
        <input class="form-control" value="{{str_replace($en,$bn,$consitituency->femaleVoter)}}">
    </div>
    <div class="form-group col-sm-4">
        <label>Total</label>
        <input class="form-control" value="{{str_replace($en,$bn,$consitituency->maleVoter+$consitituency->femaleVoter)}}" readonly>
    </div>

</div>