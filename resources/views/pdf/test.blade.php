
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
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





        body{
            font-family: 'bangla', sans-serif;
            font-size: 14px;
            padding: 0px;
            margin: 0px;
        }




        @page { margin-bottom: 0; }
    </style>

</head>
<body>
<div class="">
    <div style="background: #fff; " class="">

        <h2 align="center"><u>Candidate</u></h2>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style=" border: none;width:80%">
                    <h3 style="">{{$candidate->cname}}</h3>
                    <p style="max-width: 300px">Cell No: {{$candidate->phoneNumber}} <br>
                        address: {{$candidate->address}}
                    </p>

                </td>
                <td style="width: 20%; border: none; "><img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt=""></td>
            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;width: 50%;">
                    DOB : {{$candidate->dob}}
                </td>


                <td style="border: none;width: 50%;">
                    Gender : {{$candidate->gender}}
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    Blood Group : {{$candidate->bloodGroup}}
                </td>


                <td style="border: none;width: 50%;">
                    NID : {{$candidate->nid}}
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    Party : {{$candidate->partyName}}
                </td>


                <td style="border: none;width: 50%;">
                    Constituency : {{$candidate->consname}}
                </td>
            </tr>
            <tr>
                <td style="border: none;width: 80%;">
                    Remake : {{$candidate->remark}}
                </td>
            </tr>



        </table>


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Promoters</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            @php $count=1;@endphp
            @foreach($promoters as $prm)

                <tr>
                    <td width="2%" style="border: none; vertical-align: top">
                        <span>{{$count++}}.</span>
                    </td>


                    <td style="border: none;">

                        Name : {{$prm->proname}} <br>
                        Phone Number: {{$prm->pronumber}} <br>

                        .



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
                        <span>{{$count++}}.</span>
                    </td>


                    <td style="border: none;">

                        Name : {{$associate->assoname}} <br>
                        Phone Number: {{$associate->assonumber}} <br>

                        .



                    </td>
                </tr>

            @endforeach

        </table>


        @if($candidate->profile!=null)
            <img height="900px" width="100%" src="{{url('public/candidate/profileDoc').'/'.$candidate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif



        {{--<p style="page-break-after: always"></p>--}}








</div></div>
</body>
</html>