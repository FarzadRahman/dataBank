<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index(){
        return view('party.index');
    }


    public function insert(Request $r){
        $validatedData = $r->validate([
            'divisionName' => 'required|unique:division,divisionName|max:45'
        ]);
        $division=new Division();
        $division->divisionName=$r->divisionName;
        $division->createdBy=Auth::user()->userId;
        $division->save();
        Session::flash('message', 'Division Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $division=Division::findOrFail($r->id);

        return view('division.edit',compact('division'));
    }

    public function update(Request $r,$id){

        $validatedData = $r->validate([
            'divisionName' => 'required|unique:division,divisionName,'.$id.',divisionId|max:45'
        ]);
        $division=Division::findOrFail($id);
        $division->divisionName=$r->divisionName;
        $division->updatedBy=Auth::user()->userId;
        $division->save();
        Session::flash('message', 'Division Updated Successfully!');
        return back();
    }

}
