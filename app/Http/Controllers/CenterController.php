<?php

namespace App\Http\Controllers;

use App\Center;
use App\Constituency;
use Illuminate\Http\Request;
use Session;
use Auth;
class CenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function editCenter(Request $r){
       $center=Center::findOrFail($r->id);

       return view('center.edit',compact('center'));
   }

    public function insert(Request $r){
        $center=new Center();
        $center->constituencyId=$r->id;
        $center->centerName=$r->centerName;
        $center->location=$r->location;
        $center->maleVoter=$r->maleVoter;
        $center->femaleVoter=$r->femaleVoter;
        $center->createdBy=Auth::user()->userId;
        $center->save();
        Session::flash('message', 'Center Updated Successfully!');
        return back();
    }
   public function update(Request $r,$id){
       $center=Center::findOrFail($r->id);
       $center->centerName=$r->centerName;
       $center->location=$r->location;
       $center->maleVoter=$r->maleVoter;
       $center->femaleVoter=$r->femaleVoter;
       $center->updatedBy=Auth::user()->userId;
       $center->updatedAt=date('y-m-d');
       $center->save();
       Session::flash('message', 'Center Updated Successfully!');
       return back();
   }

   public function getCenterModal(Request $r){
       $consitituencyName=Constituency::select('name','constituencyId')->findOrFail($r->id);
       $centers=Center::where('constituencyId',$r->id)->get();


       return view('center.getCenterModal',compact('centers','consitituencyName'));

   }
}
