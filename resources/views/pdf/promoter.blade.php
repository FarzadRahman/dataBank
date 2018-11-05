
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


        <h2 align="center"><u>Promoter</u></h2>
        <table border="0" style="width:100%; margin-top: 30px; border: none;">
            <tr>

            
                 <td style="width:40%">
                    <h3 style="">বিভাগের নাম  : {{$associate->divisionName}}</h3>
                    <p style="">আসন নং : {{$associate->consnumber}} <br>
                        নির্বাচনী এলাকা : {{$associate->constituencyName}} <br>
                        রাজনৈতিক দল : {{$associate->partyName}} <br>
                         প্রার্থীর নাম : {{$associate->candidateName}}
                    </p>

                </td>
                <td style="width: 40%; border: none; "></td>
                <td style="width: 20%; border: none;"><img height="150px" width="150px" src="{{url('public/promoter/promoterImages/thumb').'/'.$associate->image}}" alt=""></td>
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
                    <h3> নাম : {{$associate->name}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3>মোবাইল : {{$associate->phoneNumber}}</h3>
                </td>
            </tr>

            <tr>

                <td  style="border: none;width: 50%;">
                    <h3>  <h3>পেশা : {{$associate->occupation}}</h3> </h3>
                </td>

                <td style="border: none;width: 50%;">
                    <h3>লিঙ্গ :
                        @foreach(GENDER as $key=>$value)
                            @if($associate->gender==$value)
                                {{$key}}
                            @endif
                        @endforeach
                    </h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>জন্ম : {{$associate->dob}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> বয়স : {{$associate->age}}</h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3> রক্ত গ্রুপ : {{$associate->bloodGroup}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> জাতীয় পরিচয় : {{$associate->nid}}</h3>
                </td>
            </tr>


            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>জন্ম : {{$associate->dob}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3> বৈবাহিক অবস্থা : {{$associate->marital}}</h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>পত্নী : {{$associate->spouse}}</h3>
                </td>


                <td style="border: none;width: 50%;">
                    <h3>পত্নী মোবাইল : {{$associate->spouseNumber}}</h3>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>পিতা : {{$associate->father}}</h3>
                </td>

                <td style="border: none;width: 50%;">
                    <h3>পিতা মোবাইল : {{$associate->fatherNumber}}</h3>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>মাতা : {{$associate->mother}}</h3>
                </td>

                <td style="border: none;width: 50%;">
                    <h3>মাতা মোবাইল : {{$associate->motherNumber}}</h3>
                </td>
            </tr>
            <tr>
                <td  style="border: none;width: 50%;">
                    <h3>ধর্ম : {{$associate->religion}}</h3>
                </td>

                <td style="border: none;width: 50%;">

                </td>
            </tr>


            <tr>
                <td style="border: none;width: 90%;">
                    <h3>  ঠিকানা : {{$associate->address}}</h3>
                </td>
            </tr>
            <tr>
                <td style="border: none;width: 90%;">
                    <h3> মন্তব্য : {{$associate->remark}}</h3>
                </td>
            </tr>




        </table>






    @if($associate->profile!=null)
            <img height="1000px" width="900px" src="{{url('public/promoter/profileDoc').'/'.$associate->profile}}" alt="">
            <p style="page-break-after: always"></p>
        @endif















    </div>
</div>
</body>
</html>