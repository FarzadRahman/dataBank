<?php

namespace App\Http\Controllers;



use App\Associate;
use App\Party;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;
class AssociateController extends Controller
{
    public function view($id){
        $getAssociatesDetails=Associate::select('party.partyName','associates.name as associateName','associates.phoneNumber','associates.associateId',
            'associates.remark','associates.image','associates.profile',
            'associates.dob','associates.gender','associates.bloodGroup','associates.nid','associates.address')
            ->leftJoin('party','party.partyId','associates.party')->findOrFail($id);


        return view('associates.index',compact('getAssociatesDetails'));

    }

    public function add($id){

        $allParties=Party::select('partyId','partyName')->get();

        return view('associates.add',compact('allParties','id'));
    }

    public function insert(Request $r){

        //return $r;

        $associates=new Associate();

        $associates->name=$r->name;
        $associates->phoneNumber=$r->phoneNumber;
        $associates->party=$r->party;
        $associates->remark=$r->remark;
        $associates->candidateId=$r->candidateId;
        $associates->createdAt=date('Y-m-d H:m:s');
        $associates->createdBy=Auth::user()->userId;
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

        if ($r->associateForm == "1"){


            $associates->dob=$r->dob;
            $associates->gender=$r->gender;
            $associates->bloodGroup=$r->bloodGroup;
            $associates->nid=$r->nid;
            $associates->address=$r->address;



        }elseif ($r->associateForm == "2"){



            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $associates->associateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $associates->profile=$filename;
                $location = public_path('associate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }



        }
        $associates->save();


        Session::flash('message', 'Associate Added Successfully!');

        return back();


    }

    public function edit($id){

        $allParties=Party::select('partyId','partyName')->get();

        $getAssociatesDetails=Associate::select('associates.name as associateName','associates.phoneNumber','associates.associateId',
            'associates.remark','associates.image','associates.profile','associates.party',
            'associates.dob','associates.gender','associates.bloodGroup','associates.nid','associates.address')->findOrFail($id);

        return view('associates.edit',compact('allParties','getAssociatesDetails'));

    }

    public function update(Request $r){

        //return $r;

        $associates=Associate::findOrFail($r->associateId);

        $associates->name=$r->name;
        $associates->phoneNumber=$r->phoneNumber;
        $associates->party=$r->party;
        $associates->remark=$r->remark;
        $associates->profile=null;
//            $associates->candidateId=$r->candidateId;
        $associates->updatedAt=date('Y-m-d H:m:s');
        $associates->updatedAt=Auth::user()->userId;

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


        if ($r->associateForm == "1"){

            $associates->dob=$r->dob;
            $associates->gender=$r->gender;
            $associates->bloodGroup=$r->bloodGroup;
            $associates->nid=$r->nid;
            $associates->address=$r->address;


        }elseif ($r->associateForm == "2"){



            if($r->hasFile('uploadDoc')){
                $img = $r->file('uploadDoc');
                $filename= $r->associateId.'uploadDoc'.'.'.$img->getClientOriginalExtension();
                $associates->profile=$filename;
                $location = public_path('associate/profileDoc/'.$filename);
                Image::make($img)->save($location);

            }



        }

        $associates->save();



        Session::flash('message', 'Associate Updated Successfully!');

        return redirect()->route('associate.view',$r->associateId);
    }

    public function delete(Request $r){

        Associate::destroy($r->id);
        Session::flash('message', 'Associate Deleted Successfully');
    }
}
