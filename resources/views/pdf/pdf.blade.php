@extends('main')

@section('content')

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


    <div style="position: relative;" class="row ">


        <div class="col-12">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">
                    {{--@if($allEmp != null && $allEmp->cvStatus == 1)--}}

                        <div id="regForm">
                            {{--<div class="pull-right"><a class="btn btn-sm btn-success"  onclick="viewUserCv()">Download</a></div>--}}
                            {{--<div class="pull-right"><a class="btn btn-sm btn-success" href="{{route('userCv.post1',$allEmp->employeeId)}}" >Download</a></div>--}}



                            <table border="0" style="width:100%; margin-top: 10px; border: none;">
                                <tr>
                                    <td style="border: none;"><h2 style="font-size: 24px; border: none; text-align: center"><span style="border-bottom: 1px solid #000">Curriculam Vitae</span> </h2></td>
                                </tr>

                            </table>
                            <table border="0" style="width:100%; margin-top: 30px; border: none;">
                                <tr>
                                    <td style="text-align: left; border: none;">
                                        <h3 style="">{{$candidate->cname}} </h3>
                                        <p style="max-width: 300px"><span class="bold">Cell No:</span> {{$candidate->phoneNumber}} <br>
                                            {{--<span class="bold">email:</span> {{$personalInfo->email}} <br>--}}
                                            {{--<span class="bold">address:</span> {{$personalInfo->presentAddress}}--}}
                                        </p>

                                    </td>
                                    <td style="width: 13%; border: none; "><img height="150px" width="150px" src="{{url('public/candidate/candidateImages/thumb').'/'.$candidate->image}}" alt=""></td>
                                </tr>

                            </table>



                            {{--<table border="0" style="width:100%; margin-top: 25px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Education</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}


                            {{--Education--}}

                            {{--<table border="0" style="width:100%; margin-top: 10px; ">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th style="text-align: center" >Degree</th>--}}
                                    {{--<th style="text-align: center" >Institution</th>--}}
                                    {{--<th style="text-align: center" >Passing Year</th>--}}
                                    {{--<th style="text-align: center" >Result</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody >--}}
                                {{--@foreach($education as $edu)--}}
                                    {{--<tr>--}}
                                        {{--<td style="text-align: center">{{$edu->educationLevelName}} in {{$edu->degreeName}} </td>--}}
                                        {{--<td style="text-align: center">{{$edu->institutionName}}</td>--}}

                                        {{--<td style="text-align: center">{{$edu->passingYear}} </td>--}}

                                        {{--<td style="text-align: center"> {{$edu->result}}</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}

                                {{--</tbody>--}}


                            {{--</table >--}}


                            {{--<table border="0" style="width:100%; margin-top: 15px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Job Experience</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}


                            {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}

                                {{--@php $count=1;@endphp--}}
                                {{--@foreach($jobExperience as $exp)--}}

                                    {{--<tr>--}}
                                        {{--<td width="2%" style="border: none; vertical-align: top">--}}
                                            {{--<span class="bold">{{$count++}}.</span>--}}
                                        {{--</td>--}}


                                        {{--<td style="border: none;">--}}

                                            {{--<span class="bold"> Company Name :</span> &nbsp;&nbsp;&nbsp; {{$exp->organization}} <br>--}}
                                            {{--<span class="bold">Position:</span>&nbsp;&nbsp;&nbsp; {{$exp->degisnation}} <br>--}}
                                            {{--<span class="bold"> Address:</span>&nbsp;&nbsp;&nbsp; {{$exp->address}} <br>--}}
                                            {{--<span class="bold"> Duration:</span>&nbsp;&nbsp;&nbsp; {{$exp->startDate}} -  @if($exp->endDate) {{$exp->endDate}} @else--}}
                                                {{--Continuing--}}
                                            {{--@endif--}}
                                            {{--.--}}



                                        {{--</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}

                            {{--</table>--}}


                            {{--<table border="0" style="width:100%; margin-top: 15px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000; background-color: #eff0f1;" ><b>Training Certificate</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}

                            {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}

                                {{--@php $count=1;@endphp--}}


                                {{--@foreach($trainingCertificate as $certificate)--}}
                                    {{--<tr>--}}
                                        {{--<td width="2%" style="border: none; vertical-align: top">--}}
                                            {{--<span class="bold">{{$count++}}.</span>--}}
                                        {{--</td>--}}
                                        {{--<td style="border: none;">--}}
                                            {{--<span class="bold"> Training Name :</span> &nbsp;&nbsp;&nbsp;{{$certificate->trainingName}} <br>--}}
                                            {{--<span class="bold"> Vanue:</span> &nbsp;&nbsp;&nbsp;{{$certificate->vanue}} <br>--}}
                                            {{--<span class="bold"> Duration:</span> &nbsp;&nbsp;&nbsp;{{$certificate->startDate}} -  @if($certificate->endDate) {{$certificate->endDate}} @else--}}
                                                {{--Continuing--}}
                                            {{--@endif--}}
                                            {{--.--}}



                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}

                            {{--</table>--}}

                            {{--<p style="page-break-after: always"></p>--}}

                            {{--<table border="0" style="width:100%;border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"> <b>Professional Certificate</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}

                            {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}
                                {{--@foreach($professionalCertificate as $certificate)--}}
                                    {{--<tr>--}}

                                        {{--<td style="border: none; width: 20%"><span class="bold">Certificate Name</span></td>--}}
                                        {{--<td style="border: none; width: 5%"><span class="bold">:</span></td>--}}
                                        {{--<td style="border: none;"><b>{{$certificate->certificateName}}</b> </td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}

                                        {{--<td style="border: none; width: 20%"><span class="bold">Institution Name</span></td>--}}
                                        {{--<td style="border: none; width: 5%"><span class="bold">:</span></td>--}}
                                        {{--<td style="border: none;">{{$certificate->institutionName}} </td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}

                                        {{--<td style="border: none; width: 20%"><span class="bold">Session</span></td>--}}
                                        {{--<td style="border: none; width: 5%"><span class="bold">:</span></td>--}}
                                        {{--<td style="border: none;">{{$certificate->startDate}} - {{$certificate->endDate}}</td>--}}
                                    {{--</tr>--}}

                                    {{--<tr>--}}
                                        {{--<td style="border: none; width: 20%"><span class="bold">Status</span></td>--}}
                                        {{--<td style="border: none; width: 5%"><span class="bold">:</span></td>--}}
                                        {{--<td style="border: none;">--}}
                                            {{--@if($certificate->status == 1) On Going--}}
                                            {{--@else--}}
                                                {{--Completed--}}
                                            {{--@endif--}}

                                        {{--</td>--}}
                                    {{--</tr>--}}

                                    {{--<tr>--}}

                                        {{--<td style="border: none; width: 20%"><span class="bold">Result</span></td>--}}
                                        {{--<td style="border: none; width: 5%"><span class="bold">:</span></td>--}}
                                        {{--<td style="border: none;">{{$certificate->result}}</td>--}}
                                    {{--</tr>--}}

                                {{--@endforeach--}}

                            {{--</table >--}}

                            {{--<table border="0" style="width:100%; margin-top: 25px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Personal Info</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                            {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}

                                {{--<tr>--}}
                                    {{--<td  style="border: none;">--}}
                                        {{--Father Name : {{$personalInfo->fathersName}}--}}
                                    {{--</td>--}}


                                    {{--<td style="border: none;">--}}
                                        {{--Mother Name : {{$personalInfo->mothersName}}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td  style="border: none;">--}}
                                        {{--Gender :--}}
                                        {{--@if($personalInfo->gender == "M")--}}
                                            {{--{{"Male"}}--}}
                                        {{--@else--}}
                                            {{--{{"Female"}}--}}
                                        {{--@endif--}}
                                    {{--</td>--}}



                                    {{--<td style="border: none;">--}}
                                        {{--Date Of Birth : {{$personalInfo->dateOfBirth}}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td  style="border: none;">--}}
                                        {{--Religion : {{$personalInfo->religionName}}--}}
                                    {{--</td>--}}


                                    {{--<td style="border: none;">--}}
                                        {{--Nationality : {{$personalInfo->nationalityName}}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td  style="border: none;">--}}
                                        {{--Permanent Address : {{$personalInfo->parmanentAddress}}--}}
                                    {{--</td>--}}


                                    {{--<td style="border: none;">--}}
                                        {{--National Id : {{$personalInfo->nationalId}}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                            {{--</table>--}}

                            {{--<table border="0" style="width:100%; margin-top: 5px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Relative in Caritas</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}

                            {{--<table border="0" style="width:100%; margin-top: 5px; border: none;">--}}

                                {{--<tr style=" border: none;">--}}
                                    {{--@if($relativeCb->isEmpty())<td style=" border: none; text-align: center"> <strong>None </strong> </td> @endif--}}
                                    {{--@foreach($relativeCb as $ref)--}}

                                        {{--<td style="border: none;">--}}
                                            {{--<span class="bold"> Name :</span> &nbsp;&nbsp;&nbsp;{{$ref->firstName}} {{$ref->lastName}} <br>--}}
                                            {{--<span class="bold">  Position:</span> &nbsp;&nbsp;&nbsp;{{$ref->degisnation}} <br>--}}

                                        {{--</td>--}}

                                    {{--@endforeach--}}

                                {{--</tr>--}}


                            {{--</table>--}}


                            {{--<table border="0" style="width:100%; margin-top: 15px; border: none;">--}}
                                {{--<tr>--}}
                                    {{--<td class="label" style="text-align: left; border: none; border-bottom: 1px solid #000"><b>Referee</b> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}

                            {{--<table border="0" style="width:100%; margin-top: 10px; border: none;">--}}

                                {{--@php $count=1;@endphp--}}


                                {{--@foreach($refree as $ref)--}}
                                    {{--<tr style="">--}}

                                        {{--<td width="2%" style="border: none; vertical-align: top">--}}
                                            {{--<span class="bold">{{$count++}}.</span>--}}
                                        {{--</td>--}}

                                        {{--<td style="border: none;">--}}
                                            {{--<span class="bold">Name :</span> &nbsp;&nbsp;&nbsp;{{$ref->firstName}} {{$ref->lastName}} <br>--}}
                                            {{--<span class="bold">Contact:</span> &nbsp;&nbsp;&nbsp;{{$ref->phone}} <br>--}}
                                            {{--<span class="bold">Position:</span> &nbsp;&nbsp;&nbsp;{{$ref->presentposition}} <br>--}}
                                            {{--<span class="bold">email:</span> &nbsp;&nbsp;&nbsp;{{$ref->email}}--}}

                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}

                            {{--</table>--}}

                        {{--</div>--}}
                    {{--@endif--}}


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div>
@endsection

@section('foot-js')



@endsection