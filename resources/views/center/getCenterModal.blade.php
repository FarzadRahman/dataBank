<h5 align="center">{{$consitituencyName}}</h5>
<table class="table">
    <thead>
    <th>Center Name</th>
    <th>Total Voter</th>
    </thead>
    <tbody>
        @foreach($centers as $center)
            <tr>
                <td>{{$center->centerName}}</td>
                <td>{{$center->maleVoter+$center->femaleVoter}}</td>
            </tr>
        @endforeach
    </tbody>
</table>