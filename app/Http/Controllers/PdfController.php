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
    public function  createpfd(Request $r){
        //$candidate = Candidate::get();
        $id = $r->id;

        $candidate = Candidate::select('candidateId','constituency.name as consname', 'candidate.name as cname', 'phoneNumber', 'partyName', 'remark', 'image', 'profile' , 'candidate.constituencyId', 'address' ,
            'dob', 'gender', 'bloodGroup' , 'nid')
            ->leftjoin('party','party.partyId','candidate.party')
            ->leftjoin('constituency','constituency.constituencyId','candidate.constituencyId')
            -> where('candidateId' , $id)
            ->first();
        $promoters =    Promoter::select('promotersId', 'promoters.name as proname', 'promoters.phoneNumber as pronumber')
            -> where('candidateId' , $id)
        ->get();
        $associates =  Associate::select('associateId','associates.name as assoname' , 'associates.phoneNumber as assonumber')
            -> where('candidateId' , $id)
        ->get();

        $pdf = PDF::loadView('pdf.pdf' ,compact('candidate', 'promoters', 'associates'));
        return $pdf->download('candidate.pdf');
      // return view('pdf.pdf');
    }
}
