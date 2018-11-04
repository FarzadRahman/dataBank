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

use DB;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id){

        $constituency=Constituency::select('constituencyId','name')
            ->findOrFail($id);

        return view('candidates.index',compact('constituency'));
    }
    public function getCandidate(Request $r){

        $getAllCandidates=Candidate::Select('candidate.candidateId','candidate.name','candidate.phoneNumber',
            DB::raw('COUNT(distinct associates.associateId) as totalAssociate'),
            DB::raw('COUNT(distinct promoters.promotersId) as totalPromoters')
            )
            ->where('constituencyId',$r->constituencyId)
            ->leftJoin('associates','associates.candidateId','candidate.candidateId')
            ->leftJoin('promoters','promoters.candidateId','candidate.candidateId')
            ->groupBy('candidate.candidateId')
            ->get();

        $datatables = DataTables::of($getAllCandidates);

        return $datatables->make(true);
    }

    public function add($constituencyId){

        $getCandidatesDetails=Constituency::select('constituencyId','constituency.name as constituencyName')
            ->findOrFail($constituencyId);


        $allParties=Party::select('partyId','partyName')->get();

        return view('candidates.add',compact('allParties','constituencyId','getCandidatesDetails'));
    }

    public function insert(Request $r){

        //return $r;
        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);


        $candidate=new Candidate();

        $candidate->name=$r->name;
        $candidate->phoneNumber=$r->phoneNumber;
        $candidate->party=$r->party;
        $candidate->remark=$r->remark;
        $candidate->constituencyId=$r->constituencyId;
        $candidate->createdAt=date('Y-m-d H:m:s');
        $candidate->createdBy=Auth::user()->userId;


        //New Update
        $candidate->age=$r->age;
        $candidate->marital=$r->marital;
        $candidate->spouse=$r->spouse;
        $candidate->spouseNumber=$r->spouseNumber;
        $candidate->father=$r->father;
        $candidate->fatherNumber=$r->fatherNumber;
        $candidate->mother=$r->mother;
        $candidate->motherNumber=$r->motherNumber;
        $candidate->religion=$r->religion;
        $candidate->occupation=$r->occupation;

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




//        if ($r->candidateForm == "1"){

            $candidate->dob=$r->dob;
            $candidate->gender=$r->gender;
            $candidate->bloodGroup=$r->bloodGroup;
            $candidate->nid=$r->nid;
            $candidate->address=$r->address;

//        }elseif ($r->candidateForm == "2"){



            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $candidate->candidateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $candidate->profile=$filename;
                $location = public_path('candidate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }

        if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $candidate->candidateId.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $candidate->attachment=$filename;
            $location = public_path('candidate/attachment/');
            $attachment->move($location,$filename);

        }
//        }

        $candidate->save();


        Session::flash('message', 'Candidate Added Successfully!');

        return back();


    }

    public function edit($id){

        $getCandidatesDetails=Candidate::select('candidate.*','party.partyName','constituency.name as constituencyName','candidate.name as CandidateName')
            ->leftJoin('party','party.partyId','candidate.party')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->findOrFail($id);


//        $allParties=Party::select('partyId','partyName')->get();
//        $allConstituencies=Constituency::select('constituencyId','name')->groupBy('name')->get();

        $getAllAssociate=Associate::Select('associateId','name','phoneNumber')->where('candidateId',$id)->get();
        $getPromoters=Promoter::Select('promotersId','name','phoneNumber')->where('candidateId',$id)->get();

        return view('candidates.view',compact('getAllAssociate','getPromoters','getCandidatesDetails'));


    }
    public function editForm($id){

        $getCandidatesDetails=Candidate::select('candidate.*','party.partyName','constituency.name as constituencyName','candidate.name as CandidateName')
            ->leftJoin('party','party.partyId','candidate.party')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->findOrFail($id);

        $allParties=Party::select('partyId','partyName')->get();
        $allConstituencies=Constituency::select('constituencyId','name')->groupBy('name')->get();



        return view('candidates.edit',compact('getCandidatesDetails','allParties','allConstituencies'));


    }

    public function update(Request $r){


        //return $r;
        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);

        $candidates = Candidate::findOrFail($r->candidateid);

        $candidates->name = $r->name;
        $candidates->phoneNumber = $r->phoneNumber;
        $candidates->party = $r->party;
        $candidates->constituencyId = $r->constituencyId;
        $candidates->remark = $r->remark;
//        $candidates->profile = null;
        $candidates->updatedAt = date('Y-m-d H:m:s');
        $candidates->updatedAt = Auth::user()->userId;

        //New Update
        $candidates->age=$r->age;
        $candidates->marital=$r->marital;
        $candidates->spouse=$r->spouse;
        $candidates->spouseNumber=$r->spouseNumber;
        $candidates->father=$r->father;
        $candidates->fatherNumber=$r->fatherNumber;
        $candidates->mother=$r->mother;
        $candidates->motherNumber=$r->motherNumber;
        $candidates->religion=$r->religion;
        $candidates->occupation=$r->occupation;
        if($r->deleteImage){
            $candidates->profile=null;
        }
        if($r->deleteAttachemnt){
            $candidates->attachment=null;
            unlink('public/candidate/attachment/' . $r->deleteAttachemnt);
        }

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

//        if ($r->candidateForm == "1") {

            $candidates->dob=$r->dob;
            $candidates->gender=$r->gender;
            $candidates->bloodGroup=$r->bloodGroup;
            $candidates->nid=$r->nid;
            $candidates->address=$r->address;


//        } elseif ($r->candidateForm == "2") {


            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $r->candidateid . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $candidates->profile = $filename;
                $location = public_path('candidate/profileDoc/' . $filename);
                Image::make($img)->save($location);


            }

             if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $r->candidateid.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $candidates->attachment=$filename;
            $location = public_path('candidate/attachment/');
            $attachment->move($location,$filename);

            }

        $candidates->save();


        Session::flash('message', 'Candidate Updated Successfully!');

        return redirect()->route('candidates.edit', $r->candidateid);
    }

    public function viewAll(){
        return view('candidates.all');
    }

    public function getAllCandidateData(Request $r){
        $candidates=Candidate::select('candidate.candidateId','candidate.name','candidate.phoneNumber','party.partyName',
            'constituency.name as constituencyName',
            DB::raw('COUNT(distinct associates.associateId) as totalAssociates'),
            DB::raw('COUNT(distinct promoters.promotersId) as totalPromoters'))
            ->leftJoin('party','party.partyId','candidate.party')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->leftJoin('associates','associates.candidateId','candidate.candidateId')
            ->leftJoin('promoters','promoters.candidateId','candidate.candidateId')
            ->groupBy('candidate.candidateId')
            ->groupBy('candidate.name')
            ->get();
        
        $datatables = Datatables::of($candidates);
        return $datatables->make(true);

    }

    public function delete(Request $r){

        Promoter::where('candidateId', $r->id)->delete();
        Associate::where('candidateId', $r->id)->delete();
        Candidate::destroy($r->id);
        Session::flash('message', 'Candidaate Deleted Successfully');
    }
}
