<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Candidate;
use App\Center;
use App\Constituency;
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
        return $pdf->stream('candidate.pdf');
      // return view('pdf.pdf');
    }

    public function getAssociate($id){
//        $id = 1;
        $associate=Associate::select('associates.*','party.partyName')
            ->leftjoin('party','party.partyId','associates.party')
            ->leftJoin('candidate','candidate.candidateId','associates.candidateId')
            ->findOrFail($id);

        $pdf = PDF::loadView('pdf.associate' ,compact('associate'));
        return $pdf->stream('associate.pdf');

    }

    public function getPromoter($id){
//        $id = 1;
        $associate=Promoter::select('promoters.*','party.partyName')
            ->leftjoin('party','party.partyId','promoters.party')
            ->leftJoin('candidate','candidate.candidateId','promoters.candidateId')
            ->findOrFail($id);

   

        $pdf = PDF::loadView('pdf.promoter' ,compact('associate'));
        return $pdf->stream('promoter.pdf');

    }

    public function getConstituency($id){




        $center=Center::where('constituencyId',$id)
            ->get();
        $candidates=Candidate::where('constituencyId',$id)
            ->get();
        $constituency=Constituency::leftJoin('division','division.divisionId','constituency.divisionId')
            ->findOrFail($id);

        $pdf = PDF::loadView('pdf.constituency' ,compact('constituency','candidates','center'));
        return $pdf->stream('constituency.pdf');
    }
}
