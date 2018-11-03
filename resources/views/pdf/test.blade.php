
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
            font-size: 16px;
            padding: 0px;
            margin: 0px;
        }




        @page { margin-bottom: 0; }
    </style>

</head>
<body>
<div class="">
    <div style="background: #fff; ">

        <h2 align="center"><u>প্রার্থী</u></h2>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
                <td style=" border: none;width:80%">
                    <h3 style="">{{$candidate->cname}}</h3>
                    <p style="max-width: 300px">মোবাইল : {{$candidate->phoneNumber}} <br>
                        ঠিকানা : {{$candidate->address}}
                    </p>

                </td>
                <td style="width: 20%; border: none; "><img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt=""></td>
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
                    <h3>জন্ম : {{$candidate->dob}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3>লিঙ্গ :
                        @foreach(GENDER as $key=>$value)
                            @if($candidate->gender==$value)
                                {{$key}}
                            @endif
                        @endforeach
                    </h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3> রক্ত গ্রুপ : {{$candidate->bloodGroup}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> জাতীয় পরিচয় : {{$candidate->nid}}</h3>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>দল : {{$candidate->partyName}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> নির্বাচনক্ষেত্র : {{$candidate->consname}}</h3>
                </td>
            </tr>
            <tr>
                <td style="border: none;width: 80%;">
                    <h3> মন্তব্য : {{$candidate->remark}}</h3>
                </td>
            </tr>



        </table>


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>প্রবর্তক</b> </td>
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

                        নাম : {{$prm->proname}} <br>
                        মোবাইল : {{$prm->pronumber}} <br>




                    </td>
                </tr>

            @endforeach

        </table>


        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>সহযোগী</b> </td>
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

                        নাম : {{$associate->assoname}} <br>
                        মোবাইল : {{$associate->assonumber}} <br>



                    </td>
                </tr>

            @endforeach

        </table>


        @if($candidate->profile!=null)
            <img height="1000px" width="900px" src="{{url('public/candidate/profileDoc').'/'.$candidate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif



        {{--<p style="page-break-after: always"></p>--}}







    </div>
</div>
</body>
</html>