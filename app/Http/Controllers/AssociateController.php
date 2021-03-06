<?php

namespace App\Http\Controllers;



use App\Associate;
use App\Candidate;
use App\Party;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
class AssociateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view($id){
        $getAssociatesDetails=Associate::select('candidate.constituencyId','constituency.name as constituencyName','candidate.candidateId','candidate.name as candidateName','party.partyName','associates.name as associateName','associates.*')

            ->leftJoin('candidate','candidate.candidateId','associates.candidateId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->leftJoin('party','party.partyId','associates.party')
            ->findOrFail($id);


        return view('associates.index',compact('getAssociatesDetails'));

    }

    public function add($id){

        $allParties=Party::select('partyId','partyName')->get();

        $getAssociatesDetails=Candidate::select('candidateId','candidate.name as candidateName',
            'constituency.name as constituencyName','candidate.constituencyId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->findOrFail($id);



        return view('associates.add',compact('allParties','id','getAssociatesDetails'));
    }

    public function insert(Request $r){

        //return $r;
        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);

        $associates=new Associate();

        $associates->name=$r->name;
        $associates->phoneNumber=$r->phoneNumber;
        $associates->party=$r->party;
        $associates->remark=$r->remark;
        $associates->candidateId=$r->candidateId;
        $associates->createdAt=date('Y-m-d H:m:s');
        $associates->createdBy=Auth::user()->userId;

        //New Update
        $associates->age=$r->age;
        $associates->marital=$r->marital;
        $associates->spouse=$r->spouse;
        $associates->spouseNumber=$r->spouseNumber;
        $associates->father=$r->father;
        $associates->fatherNumber=$r->fatherNumber;
        $associates->mother=$r->mother;
        $associates->motherNumber=$r->motherNumber;
        $associates->religion=$r->religion;
        $associates->occupation=$r->occupation;
        
        $associates->save();

        if($r->hasFile('image')){
            $img = $r->file('image');
            $filename= $associates->associateId.'Image'.'.'.$img->getClientOriginalExtension();
            $associates->image=$filename;
            $location = public_path('associate/associateImages/'.$filename);
            Image::make($img)->save($location);
            $location2 = public_path('associate/associateImages/thumb/'.$filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }
        $associates->save();

//        if ($r->associateForm == "1"){


            $associates->dob=$r->dob;
            $associates->gender=$r->gender;
            $associates->bloodGroup=$r->bloodGroup;
            $associates->nid=$r->nid;
            $associates->address=$r->address;



//        }elseif ($r->associateForm == "2"){



            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $associates->associateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $associates->profile=$filename;
                $location = public_path('associate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }

        if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $associates->associateId.$r->name.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $associates->attachment=$filename;
            $location = public_path('associate/attachment/');
            $attachment->move($location,$filename);

        }

//        }
        $associates->save();


        Session::flash('message', 'Associate Added Successfully!');

        return back();


    }

    public function edit($id){

        $allParties=Party::select('partyId','partyName')->get();

        $getAssociatesDetails=Associate::select('candidate.constituencyId','constituency.name as constituencyName','candidate.candidateId','candidate.name as candidateName','party.partyName','associates.name as associateName','associates.*')

            ->leftJoin('candidate','candidate.candidateId','associates.candidateId')
            ->leftJoin('constituency','constituency.constituencyId','candidate.constituencyId')
            ->leftJoin('party','party.partyId','associates.party')
            ->findOrFail($id);

        return view('associates.edit',compact('allParties','getAssociatesDetails'));

    }

    public function update(Request $r){


        $validatedData = $r->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'uploadDoc' => 'mimes:jpeg,jpg,png'
        ]);

        $associates=Associate::findOrFail($r->associateId);

        $associates->name=$r->name;
        $associates->phoneNumber=$r->phoneNumber;
        $associates->party=$r->party;
        $associates->remark=$r->remark;
//        $associates->profile=null;
//            $associates->candidateId=$r->candidateId;
        $associates->updatedAt=date('Y-m-d H:m:s');
        $associates->updatedAt=Auth::user()->userId;
        if($r->deleteImage){
            $associates->profile=null;
        }
        if($r->deleteAttachemnt){
            $associates->attachment=null;
            unlink('public/associate/attachment/' . $r->deleteAttachemnt);
        }

        //New Update
        $associates->age=$r->age;
        $associates->marital=$r->marital;
        $associates->spouse=$r->spouse;
        $associates->spouseNumber=$r->spouseNumber;
        $associates->father=$r->father;
        $associates->fatherNumber=$r->fatherNumber;
        $associates->mother=$r->mother;
        $associates->motherNumber=$r->motherNumber;
        $associates->religion=$r->religion;
        $associates->occupation=$r->occupation;

        if($r->hasFile('image')){
            $img = $r->file('image');
            $filename= $r->associateId.'Image'.'.'.$img->getClientOriginalExtension();
            $associates->image=$filename;
            $location = public_path('associate/associateImages/'.$filename);
            Image::make($img)->save($location);
            $location2 = public_path('associate/associateImages/thumb/'.$filename);
            Image::make($img)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location2);
        }
        $associates->save();


//        if ($r->associateForm == "1"){

            $associates->dob=$r->dob;
            $associates->gender=$r->gender;
            $associates->bloodGroup=$r->bloodGroup;
            $associates->nid=$r->nid;
            $associates->address=$r->address;


//        }elseif ($r->associateForm == "2"){



            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $r->associateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $associates->profile=$filename;
                $location = public_path('associate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }


        if($r->hasFile('uploadAttachment')){

            $attachment = $r->file('uploadAttachment');
            $filename= $r->associateId.$r->name.'uploadAttachment'.'.'.$attachment->getClientOriginalExtension();
            $associates->attachment=$filename;
            $location = public_path('associate/attachment/');
            $attachment->move($location,$filename);

        }

//        }

        $associates->save();



        Session::flash('message', 'Associate Updated Successfully!');

        return redirect()->route('associate.view',$r->associateId);
    }

    public function delete(Request $r){

        Associate::destroy($r->id);
        Session::flash('message', 'Associate Deleted Successfully');
    }
}
