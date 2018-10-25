<html>
<head>
    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            font-weight: bold;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }

        input {
            border: medium none;
            padding: 0;
        }

        .label{
        background-color: #eff0f1;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>


<body>
<meta http-equiv="Content-Type" content="text/html;"/>
<meta charset="UTF-8">



    <div style="position: relative;" class="row ">


        <div class="col-12">
            <div style="" class="card">
                <div class="card-body">
                    {{--@if($allEmp != null && $allEmp->cvStatus == 1)--}}

                        <div id="regForm">
                            {{--<div class="pull-right"><a class="btn btn-sm btn-success"  onclick="viewUserCv()">Download</a></div>--}}
                            {{--<div class="pull-right"><a class="btn btn-sm btn-success" href="{{route('userCv.post1',$allEmp->employeeId)}}" >Download</a></div>--}}



                            <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                <tr>
                                    <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Candidate</span> </h2></td>
                                </tr>

                            </table>

                            @if(!empty($candidate->profile) )
                                <img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt="">
                                <p style="page-break-after: always"></p>
                            @else

                            <table border="0" style="width:100%; margin-top: 30px; border: none;">
                                <tr>
                                    <td style="text-align: left; border: none;">
                                        <h3 style="">{{$candidate->cname}} </h3>
                                        <p style="max-width: 300px"><span class="bold">Cell No:</span> {{$candidate->phoneNumber}} <br>
                                            <span class="bold">Address:</span> {{$candidate->address}} <br>
                                            {{--<span class="bold">address:</span> {{$personalInfo->presentAddress}}--}}
                                        </p>

                                    </td>
                                    <td style="width: 13%; border: none; "><img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt=""></td>
                                </tr>

                            </table>



                            <table border="0" style="width:100%; margin-top: 25px; border: none;">
                                <tr>
                                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Details</b> </td>
                                </tr>
                            </table>


                            {{--Education--}}

                            <table border="0" style="width:100%; margin-top: 10px; ">
                                <tr>
                                    <th style="text-align: center" >DOB</th>
                                    <td style="text-align: center">{{$candidate->dob}} </td>
                                </tr>
                                <tr>
                                    <th style="text-align: center" >Gender</th>
                                    <td style="text-align: center">{{$candidate->gender}} </td>
                                </tr>
                                <tr>
                                    <th style="text-align: center" >Blood Group</th>
                                    <td style="text-align: center">{{$candidate->bloodGroup}} </td>
                                </tr>
                                <tr>
                                    <th style="text-align: center" >NID</th>
                                    <td style="text-align: center"> {{$candidate->nid}}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: center" >Party</th>
                                    <td style="text-align: center">{{$candidate->partyName}} </td>
                                </tr>
                                <tr>
                                    <th style="text-align: center" >Constituency</th>
                                    <td style="text-align: center">{{$candidate->consname}}</td>

                                </tr>
                                <tr>
                                    <th style="text-align: center" >Remake</th>
                                    <td style="text-align: center"> {{$candidate->remark}}</td>
                                </tr>


                            </table >


                            <table border="0" style="width:100%; margin-top: 15px; border: none;">
                                <tr>
                                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Promoters</b> </td>
                                </tr>
                            </table>

                            @endif

                            <table border="0" style="width:100%; margin-top: 10px; border: none;">

                                @php $count=1;@endphp
                                @foreach($promoters as $prm)

                                    <tr>
                                        <td width="2%" style="border: none; vertical-align: top">
                                            <span class="bold">{{$count++}}.</span>
                                        </td>


                                        <td style="border: none;">

                                            <span class="bold">Name :</span> &nbsp;&nbsp;&nbsp; {{$prm->proname}} <br>
                                            <span class="bold">Phone Number:</span>&nbsp;&nbsp;&nbsp; {{$prm->pronumber}} <br>

                                        </td>
                                    </tr>

                                @endforeach

                            </table>


                            <table border="0" style="width:100%; margin-top: 15px; border: none;">
                                <tr>
                                    <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Associates</b> </td>
                                </tr>
                            </table>


                            <table border="0" style="width:100%; margin-top: 10px; border: none;">

                                @php $count=1;@endphp
                                @foreach($associates as $associate)

                                    <tr>
                                        <td width="2%" style="border: none; vertical-align: top">
                                            <span class="bold">{{$count++}}.</span>
                                        </td>


                                        <td style="border: none;">

                                            <span class="bold">Name :</span> &nbsp;&nbsp;&nbsp; {{$associate->assoname}} <br>
                                            <span class="bold">Phone Number:</span>&nbsp;&nbsp;&nbsp; {{$associate->assonumber}} <br>

                                        </td>
                                    </tr>

                                @endforeach

                            </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div>

</body>
</html>