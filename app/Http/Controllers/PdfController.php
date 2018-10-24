<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Candidate;
use App\Promoter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
class PdfController extends Controller
{
    //
    public function  createpfd(){
        //$candidate = Candidate::get();
        $id = 3;

        $candidate = Candidate::select('candidateId', 'candidate.name as cname', 'phoneNumber', 'partyName', 'remark', 'image', 'profile' , 'candidate.constituencyId', 'address' ,
            'dob', 'gender', 'bloodGroup' , 'nid')
            ->leftjoin('party','party.partyId','candidate.party')
            ->leftjoin('constituency','constituency.constituencyId','candidate.constituencyId')
            -> where('candidateId' , $id)
            ->first();
        $promoters =    Promoter::select('promotersId', 'promoters.name as proname', 'promoters.phoneNumber as pronumber')
        ->get();
        $associates =  Associate::select('associateId','associates.name as assoname' , 'associates.phoneNumber as assonumber')
        ->get();

        $pdf = PDF::loadView('pdf.pdf' ,compact('candidate', 'promoters', 'associates'));
        return $pdf->download('candidate.pdf');
      // return view('pdf.pdf');
    }
}
