<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use Session;
use Auth;
class PartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $party=Party::get();
        return view('party.index',compact('party'));
    }


    public function insert(Request $r){
        $validatedData = $r->validate([
            'partyName' => 'required|unique:party,partyName|max:45'
        ]);
        $party=new Party();
        $party->partyName=$r->partyName;
        $party->createdBy=Auth::user()->userId;
        $party->save();
        Session::flash('message', 'Party Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $party=Party::findOrFail($r->id);

        return view('party.edit',compact('party'));
    }

    public function update(Request $r,$id){

//        return $r;

        $validatedData = $r->validate([
            'partyName' => 'required|unique:party,partyName,'.$id.',partyId|max:45'
        ]);
        $party=Party::findOrFail($id);
        $party->partyName=$r->partyName;
        $party->updatedBy=Auth::user()->userId;
        $party->save();
        Session::flash('message', 'Party Updated Successfully!');
        return back();
    }

}
