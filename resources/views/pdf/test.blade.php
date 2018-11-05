
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

        <h2 align="center"><u>Candidate</u></h2>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>
              
                <td style="width:40%">
                    <h3 style="">বিভাগের নাম  : {{$candidate->divisionName}}</h3>
                    <p style="">আসন নং : {{$candidate->consnumber}} <br>
                        নির্বাচনী এলাকা : {{$candidate->consname}} <br>
                        রাজনৈতিক দল : {{$candidate->partyName}}
                    </p>

                </td>



                <td style="width: 40%; border: none; "></td>
                <td style="width: 20%; border: none; "><img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt=""></td>
            </tr>

        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>ব্যক্তিগত তথ্য</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;font-size: 18px;">
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3> নাম : {{$candidate->cname}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3>মোবাইল : {{$candidate->phoneNumber}}</h3>
                </td>
            </tr>

            <tr>

                <td  style="border: none;width: 50%;">
                    <h3>  <h3>পেশা : {{$candidate->occupation}}</h3> </h3>
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
                    <h3>জন্ম : {{$candidate->dob}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> বয়স : {{$candidate->age}}</h3>
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
                    <h3>জন্ম : {{$candidate->dob}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> বৈবাহিক অবস্থা : {{$candidate->marital}}</h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>পত্নী : {{$candidate->spouse}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3>পত্নী মোবাইল : {{$candidate->spouseNumber}}</h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>পিতা : {{$candidate->father}}</h3>
                </td>

                <td style="border: none;width: 50%;">
                    <h3>পিতা মোবাইল : {{$candidate->fatherNumber}}</h3>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>মাতা : {{$candidate->mother}}</h3>
                </td>

                <td style="border: none;width: 50%;">
                    <h3>মাতা মোবাইল : {{$candidate->motherNumber}}</h3>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>ধর্ম : {{$candidate->religion}}</h3>
                </td>

                <td style="border: none;width: 50%;">

                </td>
            </tr>


            <tr>
                <td style="border: none;width: 90%;">
                    <h3>  ঠিকানা : {{$candidate->address}}</h3>
                </td>
            </tr>
            <tr>
                <td style="border: none;width: 90%;">
                    <h3> মন্তব্য : {{$candidate->remark}}</h3>
                </td>
            </tr>



        </table>


@if(!$associates->isEmpty())
        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>সহযোগী</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            @php $count=1;@endphp
            @foreach($associates as $associate)
                <tr>

                    <td style="border: none;width: 10px;">{{$count++}}</td>
                    <td style="border: none;">

                        নাম : {{$associate->assoname}}
                    </td>
                    <td style="border: none;"> মোবাইল : {{$associate->assonumber}}</td>
                </tr>
                <tr>
                    <td style="border: none;width: 10px;"></td>

                    <td style="border: none;">দল : {{$associate->partyName}}</td>
                    <td style="border: none;">লিঙ্গ : @foreach(GENDER as $key=>$value)
                            @if($associate->gender==$value)
                                {{$key}}
                            @endif
                        @endforeach</td>



                </tr>




            @endforeach

        </table>

@endif

@if(!$promoters->isEmpty())
        <table border="0" style="width:100%; margin-top: 15px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>প্রবর্তক</b> </td>
            </tr>
        </table>


        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            @php $count=1;@endphp
            @foreach($promoters as $prm)

                <tr>

                    <td style="border: none;width: 10px;">{{$count++}}</td>
                    <td style="border: none;">

                        নাম : {{$prm->proname}}
                    </td>
                    <td style="border: none;"> মোবাইল : {{$prm->pronumber}}</td>
                </tr>
                <tr>

                    <td style="border: none;width: 10px;"></td>
                    <td style="border: none;">দল : {{$prm->partyName}}</td>
                    <td style="border: none;">লিঙ্গ : @foreach(GENDER as $key=>$value)
                            @if($prm->gender==$value)
                                {{$key}}
                            @endif
                        @endforeach</td>



                </tr>

            @endforeach

        </table>
@endif
        @if($candidate->profile!=null)
            <img height="1000px" width="900px" src="{{url('public/candidate/profileDoc').'/'.$candidate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif



        {{--<p style="page-break-after: always"></p>--}}







    </div>
</div>
</body>
</html>