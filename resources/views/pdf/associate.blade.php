
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

        <h2 align="center"><u>Associates</u></h2>

        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style=" border: none;width: 80%">
                    <h3 style="">{{$associate->name}}</h3>
                    <p style="max-width: 200px">Cell No: {{$associate->phoneNumber}} <br>
                        address: {{$associate->address}}
                    </p>

                </td>
                <td style="width: 20%; border: none;"><img height="150px" width="150px" src="{{url('public/associate/associateImages/thumb').'/'.$associate->image}}" alt=""></td>
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
                    DOB : {{$associate->dob}}
                </td>


                <td style="border: none;width: 50%;">
                    Gender : {{$associate->gender}}
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    Blood Group : {{$associate->bloodGroup}}
                </td>


                <td style="border: none;width: 50%;">
                    NID : {{$associate->nid}}
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    Party : {{$associate->partyName}}
                </td>


                {{--<td style="border: none;width: 50%;">--}}
                    {{--Constituency : {{$associate->consname}}--}}
                {{--</td>--}}
            </tr>
            <tr>
                <td style="border: none;width: 80%;">
                    Remake : {{$associate->remark}}
                </td>
            </tr>



        </table>









        {{--<p style="page-break-after: always"></p>--}}



        @if($associate->profile!=null)
            <img height="900px" width="100%" src="{{url('public/associate/profileDoc').'/'.$associate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif




    </div></div>
</body>
</html>