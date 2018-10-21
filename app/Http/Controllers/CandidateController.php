<?php

namespace App\Http\Controllers;

use App\Associate;
use App\Candidate;
use App\Constituency;

use App\Party;
use App\Promoter;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    public function index(){


        return view('candidates.index');
    }
    public function getAllCandidate(Request $r){

        $getAllCandidates=Candidate::Select('candidateId','name','phoneNumber');
        $datatables = DataTables::of($getAllCandidates);

        return $datatables->make(true);
    }

    public function add(){

        $allParties=Party::select('partyId','partyName')->get();
        $allConstituencies=Constituency::select('constituencyId','name')->groupBy('name')->get();
        return view('candidates.add',compact('allParties','allConstituencies'));
    }

    public function insert(Request $r){

        if ($r->candidateForm == "1"){

            $candidate=new Candidate();

            $candidate->name=$r->name;
            $candidate->phoneNumber=$r->phoneNumber;
            $candidate->party=$r->party;
            $candidate->remark=$r->remark;
            $candidate->constituencyId=$r->constituencyId;
            $candidate->createdAt=date('Y-m-d H:m:s');
            $candidate->createdBy=Auth::user()->userId;
            $candidate->save();

            if($r->hasFile('image')){
                $img = $r->file('image');
                $filename= $candidate->candidateId.'Image'.'.'.$img->getClientOriginalExtension();
                $candidate->image=$filename;
                $location = public_path('candidate/candidateImages/'.$filename);
                Image::make($img)->save($location);
                $location2 = public_path('candidate/candidateImages/thumb/'.$filename);
                Image::make($img)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location2);
            }
            $candidate->save();


        }elseif ($r->candidateForm == "2"){

            $candidate=new Candidate();

            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $candidate->candidateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $candidate->profile=$filename;
                $location = public_path('candidate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }
            $candidate->save();


        }


        Session::flash('message', 'Candidate Added Successfully!');

        return back();


    }

    public function edit($id){

        $getCandidatesDetails=Candidate::select('party.partyName','constituency.name as constituencyName','candidate.name as CandidateName','candidate.phoneNumber','candidate.candidateId',
            'candidate.remark','candidate.image','candidate.profile')
            ->leftJoin('party','party.partyId','candidate.party')->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')->findOrFail($id);

//        $allParties=Party::select('partyId','partyName')->get();
//        $allConstituencies=Constituency::select('constituencyId','name')->groupBy('name')->get();

        $getAllAssociate=Associate::Select('associateId','name','phoneNumber')->where('candidateId',$id)->get();
        $getPromoters=Promoter::Select('promotersId','name','phoneNumber')->where('candidateId',$id)->get();

        return view('candidates.view',compact('getAllAssociate','getPromoters','getCandidatesDetails'));


    }
    public function editForm($id){

        $getCandidatesDetails=Candidate::select('candidate.name as CandidateName','candidate.phoneNumber','candidate.candidateId',
            'candidate.remark','candidate.image','candidate.profile','candidate.party','candidate.constituencyId')
            ->findOrFail($id);

        $allParties=Party::select('partyId','partyName')->get();
        $allConstituencies=Constituency::select('constituencyId','name')->groupBy('name')->get();



        return view('candidates.edit',compact('getCandidatesDetails','allParties','allConstituencies'));


    }

    public function update(Request $r){

        $candidates = Candidate::findOrFail($r->candidateid);

        if ($r->candidateForm == "1") {

            $candidates->name = $r->name;
            $candidates->phoneNumber = $r->phoneNumber;
            $candidates->party = $r->party;
            $candidates->constituencyId = $r->constituencyId;
            $candidates->remark = $r->remark;
            $candidates->profile = null;
            $candidates->updatedAt = date('Y-m-d H:m:s');
            $candidates->updatedAt = Auth::user()->userId;

            if ($r->hasFile('image')) {
                $img = $r->file('image');
                $filename = $r->candidateid . 'Image' . '.' . $img->getClientOriginalExtension();
                $candidates->image = $filename;
                $location = public_path('candidate/candidateImages/' . $filename);
                Image::make($img)->save($location);
                $location2 = public_path('candidate/candidateImages/thumb/' . $filename);
                Image::make($img)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location2);
            }
            $candidates->save();


        } elseif ($r->candidateForm == "2") {


            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $r->candidateid . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $candidates->profile = $filename;
                $location = public_path('candidate/profileDoc/' . $filename);
                Image::make($img)->save($location);

            }
            $candidates->save();


        }


        Session::flash('message', 'Candidate Updated Successfully!');

        return redirect()->route('candidates.edit', $r->candidateid);
    }

    public function delete(Request $r){

        Promoter::where('candidateId', $r->id)->delete();
        Associate::where('candidateId', $r->id)->delete();
        Candidate::destroy($r->id);
        Session::flash('message', 'Candidaate Deleted Successfully');
    }
}
