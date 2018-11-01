
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
<?php
$bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
$en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");


?>
<div class="">
    <div style="background: #fff; " class="">

        <h2 align="center"><u>নির্বাচনক্ষেত্র</u></h2>





        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>নির্বাচনক্ষেত্র তথ্য</b> </td>
            </tr>
        </table>
        <table border="0" style="width:100%; margin-top: 10px; border: none;">

            <tr>



                <td style="border: none;width: 50%;">
                    <h4>নির্বাচনক্ষেত্রর নাম :  {{$constituency->name}}</h4>
                </td>
                <td  style="border: none;width: 50%;">
                    <h4>নির্বাচনক্ষেত্রর সংখ্যা:  {{$constituency->number}}</h4>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h4>এলাকা :  {{$constituency->area}}</h4>
                </td>


                <td style="border: none;width: 50%;">
                    <h4> বিভাগ :  {{$constituency->divisionName}}</h4>
                </td>
            </tr>

            <tr>
                <td  style="border: none;width: 50%;">
                    <h4>ভোটার :  {{str_replace($en,$bn,$constituency->maleVoter+$constituency->femaleVoter)}}</h4>
                </td>


            </tr>

            {{--<tr>--}}
                {{--<td  style="border: none;width: 50%;">--}}
                    {{--<h4>পুরুষ ভোটার :  {{str_replace($en,$bn,$constituency->maleVoter)}}</h4>--}}
                {{--</td>--}}


                {{--<td style="border: none;width: 50%;">--}}
                    {{--<h4> মহিলা ভোটার :  {{str_replace($en,$bn,$constituency->femaleVoter)}}</h4>--}}
                {{--</td>--}}
            {{--</tr>--}}




        </table>


        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>ভোট কেন্দ্র</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <thead>
                <tr>
                    <th style="text-align: center">নাম</th>
                    <th style="text-align: center">ঠিকানা</th>
                    <th style="text-align: center">পুরুষ ভোটার</th>
                    <th style="text-align: center">মহিলা ভোটার</th>
                </tr>
            </thead>
            <tbody>
            @foreach($center as $cen)
                <tr>
                    <td style="text-align: center">{{$cen->centerName}}</td>
                    <td style="text-align: center">{{$cen->location}}</td>
                    <td style="text-align: center">{{str_replace($en,$bn,$cen->maleVoter)}}</td>
                    <td style="text-align: center">{{str_replace($en,$bn,$cen->femaleVoter)}}</td>
                </tr>
            @endforeach
            </tbody>


        </table>



        <table border="0" style="width:100%; margin-top: 25px; border: none;">
            <tr>
                <td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>প্রার্থী</b> </td>
            </tr>
        </table>

        <table border="0" style="width:100%; margin-top: 10px; border: none;">
            <thead>
            <tr>
                <th style="text-align: center">নাম</th>
                <th style="text-align: center">মোবাইল</th>
            </tr>
            </thead>
            <tbody>
            @foreach($candidates as $cen)
                <tr>
                    <td style="text-align: center">{{$cen->name}}</td>
                    <td style="text-align: center">{{$cen->phoneNumber}}</td>
                </tr>
            @endforeach
            </tbody>


        </table>















    </div>
</div>
</body>
</html>