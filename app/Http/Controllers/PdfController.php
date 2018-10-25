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
    public function  createpfd($id){
        //$candidate = Candidate::get();
//        $id = 1;

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



        $pdf = PDF::loadView('pdf.test' ,compact('candidate', 'promoters', 'associates'));
        return $pdf->download('candidate.pdf');
      // return view('pdf.pdf');
    }

    public function getAssociate($id){
//        $id = 1;
        $associate=Associate::select('associates.*','party.partyName')
            ->leftjoin('party','party.partyId','associates.party')
            ->findOrFail($id);

        $pdf = PDF::loadView('pdf.associate' ,compact('associate'));
        return $pdf->download('associate.pdf');

    }

    public function getPromoter($id){
//        $id = 1;
        $associate=Promoter::select('promoters.*','party.partyName')
            ->leftjoin('party','party.partyId','promoters.party')
            ->findOrFail($id);

//        return $associate;

        $pdf = PDF::loadView('pdf.promoter' ,compact('associate'));
        return $pdf->download('associate.pdf');

    }
}
