<?php

namespace App\Http\Controllers;

use App\Constituency;
use App\Division;
use Illuminate\Http\Request;
use Session;
use Auth;
class ConstituencyController extends Controller
{
    public function index(){
        return view('constituency.index');
    }

    public function add(){
        $divisions=Division::select('divisionId','divisionName')->get();
        return view('constituency.add',compact('divisions'));
    }

    public function insert(Request $r){
//        return $r;
        $consituency=new Constituency();
        $consituency->number=$r->number;
        $consituency->name=$r->name;
        $consituency->area=$r->area;
        $consituency->divisionId=$r->divisionId;
        $consituency->maleVoter=$r->maleVoter;
        $consituency->femaleVoter=$r->femaleVoter;
        $consituency->createdBy=Auth::user()->userId;
        $consituency->save();

        Session::flash('message', 'Constituency Added Successfully!');

        return back();


    }

    public function edit($id){
        $consituency=Constituency::findOrFail($id);
        $divisions=Division::select('divisionId','divisionName')->get();
        return view('constituency.edit',compact('divisions','consituency'));

    }
}
