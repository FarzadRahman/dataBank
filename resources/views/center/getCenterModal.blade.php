<h5 align="center">{{$consitituencyName}}</h5>
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