<?php

namespace App\Http\Controllers;


use App\Candidate;
use App\Party;
use App\Promoter;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
class PromoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view($id)
    {

        $getPromotersDetails = Promoter::select('candidate.constituencyId','constituency.name as constituencyName','candidate.candidateId','candidate.name as candidateName','party.partyName', 'promoters.name as promoterName', 'promoters.*')
            ->leftJoin('candidate','candidate.candidateId','promoters.candidateId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->leftJoin('party', 'party.partyId', 'promoters.party')
            ->findOrFail($id);


        return view('promoters.index', compact('getPromotersDetails'));
    }

    public function add($id)
    {
        $getPromotersDetails=Candidate::select('candidateId','candidate.name as candidateName',
            'constituency.name as constituencyName','candidate.constituencyId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->findOrFail($id);

        $allParties = Party::select('partyId', 'partyName')->get();

        return view('promoters.add', compact('allParties', 'id','getPromotersDetails'));
    }

    public function insert(Request $r)
    {
        //return $r;
        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);

        $promoters = new Promoter();

        $promoters->name = $r->name;
        $promoters->phoneNumber = $r->phoneNumber;
        $promoters->party = $r->party;
        $promoters->remark = $r->remark;
        $promoters->candidateId = $r->candidateId;
        $promoters->createdAt = date('Y-m-d H:m:s');
        $promoters->createdBy = Auth::user()->userId;


        //New Update
        $promoters->age=$r->age;
        $promoters->marital=$r->marital;
        $promoters->spouse=$r->spouse;
        $promoters->spouseNumber=$r->spouseNumber;
        $promoters->father=$r->father;
        $promoters->fatherNumber=$r->fatherNumber;
        $promoters->mother=$r->mother;
        $promoters->motherNumber=$r->motherNumber;
        $promoters->religion=$r->religion;
        $promoters->occupation=$r->occupation;
        
        $promoters->save();

        if ($r->hasFile('image')) {
            $img = $r->file('image');
            $filename = $promoters->promotersId . 'Image' . '.' . $img->getClientOriginalExtension();
            $promoters->image = $filename;
            $location = public_path('promoter/promoterImages/' . $filename);
            Image::make($img)->save($location);
            $location2 = public_path('promoter/promoterImages/thumb/' . $filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }
        $promoters->save();


//        if ($r->promoterForm == "1") {

            $promoters->dob=$r->dob;
            $promoters->gender=$r->gender;
            $promoters->bloodGroup=$r->bloodGroup;
            $promoters->nid=$r->nid;
            $promoters->address=$r->address;


//        } elseif ($r->promoterForm == "2") {



            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $promoters->promotersId . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $promoters->profile = $filename;
                $location = public_path('promoter/profileDoc/' . $filename);
                Image::make($img)->save($location);

            }

        if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $promoters->promotersId.$r->name.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $promoters->attachment=$filename;
            $location = public_path('promoter/attachment/');
            $attachment->move($location,$filename);

        }



//        }

        $promoters->save();


        Session::flash('message', 'Promoter Added Successfully!');

        return back();


    }

    public function edit($id)
    {

        $allParties = Party::select('partyId', 'partyName')->get();
        $getPromotersDetails = Promoter::select('candidate.constituencyId','constituency.name as constituencyName','candidate.candidateId','candidate.name as candidateName','party.partyName', 'promoters.name as promoterName', 'promoters.*')
            ->leftJoin('candidate','candidate.candidateId','promoters.candidateId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->leftJoin('party', 'party.partyId', 'promoters.party')
            ->findOrFail($id);

//        $getPromotersDetails = Promoter::select('promoters.name as promoterName', 'promoters.phoneNumber', 'promoters.promotersId',
//            'promoters.remark', 'promoters.image', 'promoters.profile', 'promoters.party',
//            'promoters.dob','promoters.gender','promoters.bloodGroup','promoters.nid','promoters.address')
//
//            ->findOrFail($id);

        return view('promoters.edit', compact('allParties', 'getPromotersDetails'));

    }

    public function update(Request $r)
    {

       // return $r;
        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);



        $promoters = Promoter::findOrFail($r->promoterId);

        $promoters->name = $r->name;
        $promoters->phoneNumber = $r->phoneNumber;
        $promoters->party = $r->party;
        $promoters->remark = $r->remark;
//        $promoters->profile = null;
        $promoters->updatedAt = date('Y-m-d H:m:s');
        $promoters->updatedAt = Auth::user()->userId;

        //New Update
        $promoters->age=$r->age;
        $promoters->marital=$r->marital;
        $promoters->spouse=$r->spouse;
        $promoters->spouseNumber=$r->spouseNumber;
        $promoters->father=$r->father;
        $promoters->fatherNumber=$r->fatherNumber;
        $promoters->mother=$r->mother;
        $promoters->motherNumber=$r->motherNumber;
        $promoters->religion=$r->religion;
        $promoters->occupation=$r->occupation;
        if($r->deleteImage){
            $promoters->profile=null;
        }
        if($r->deleteAttachemnt){
            $promoters->attachment=null;
            unlink('public/promoter/attachment/' . $r->deleteAttachemnt);
        }


        if ($r->hasFile('image')) {
            $img = $r->file('image');
            $filename = $r->promoterId . 'Image' . '.' . $img->getClientOriginalExtension();
            $promoters->image = $filename;
            $location = public_path('promoter/promoterImages/' . $filename);
            Image::make($img)->save($location);
            $location2 = public_path('promoter/promoterImages/thumb/' . $filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }
        $promoters->save();


//        if ($r->promoterForm == "1") {



            $promoters->dob=$r->dob;
            $promoters->gender=$r->gender;
            $promoters->bloodGroup=$r->bloodGroup;
            $promoters->nid=$r->nid;
            $promoters->address=$r->address;


//        } elseif ($r->promoterForm == "2") {


            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $r->promoterId . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $promoters->profile = $filename;
                $location = public_path('promoter/profileDoc/' . $filename);
                Image::make($img)->save($location);

            }

        if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $r->promoterId.$r->name.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $promoters->attachment=$filename;
            $location = public_path('promoter/attachment/');
            $attachment->move($location,$filename);

        }



//        }

        $promoters->save();


        Session::flash('message', 'Promoter Updated Successfully!');

        return redirect()->route('promoter.view', $r->promoterId);
    }

    public function delete(Request $r){

        Promoter::destroy($r->id);
        Session::flash('message', 'Promoter Deleted Successfully');
    }
}
