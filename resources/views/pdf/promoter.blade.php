
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


        <h2 align="center"><u>প্রবর্তক</u></h2>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style=" border: none;width: 80%">
                    <h3 style="">{{$associate->name}}</h3>
                    <p style="max-width: 200px">মোবাইল : {{$associate->phoneNumber}} <br>
                        ঠিকানা : {{$associate->address}}
                    </p>

                </td>
                <td style="width: 20%; border: none;"><img height="150px" width="150px" src="{{url('public/promoter/promoterImages/thumb').'/'.$associate->image}}" alt=""></td>
            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>ব্যক্তিগত তথ্য</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;width: 50%;">
                    <h2>জন্ম : {{$associate->dob}}</h2>
                </td>


                <td style="border: none;width: 50%;">
                    <h2> লিঙ্গ :
                        @foreach(GENDER as $key=>$value)
                            @if($associate->gender==$value)
                                {{$key}}
                            @endif
                        @endforeach
                    </h2>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h2> রক্ত গ্রুপ : {{$associate->bloodGroup}}</h2>
                </td>


                <td style="border: none;width: 50%;">
                    <h2>জাতীয় পরিচয় : {{$associate->nid}}</h2>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h2>  দল : {{$associate->partyName}}</h2>
                </td>


                {{--<td style="border: none;width: 50%;">--}}
                {{--Constituency : {{$associate->consname}}--}}
                {{--</td>--}}
            </tr>
            <tr>
                <td style="border: none;width: 80%;">
                    <h2>মন্তব্য : {{$associate->remark}}</h2>
                </td>
            </tr>



        </table>





        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>নির্বাচনক্ষেত্র তথ্য</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>
                <td  style="border: none;width: 50%;">
                    <h2>নির্বাচনক্ষেত্র নাম: {{$associate->constituencyName}}</h2>
                </td>


                <td  style="border: none;width: 50%;">
                    <h2>প্রার্থী নাম: {{$associate->candidateName}}</h2>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h2>বিভাগ নাম: {{$associate->divisionName}}</h2>
                </td>


                <td  style="border: none;width: 50%;">

                </td>
            </tr>




        </table>





    @if($associate->profile!=null)
            <img height="1000px" width="100%" src="{{url('public/promoter/profileDoc').'/'.$associate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif






        {{--<p style="page-break-after: always"></p>--}}








    </div></div>
</body>
</html>