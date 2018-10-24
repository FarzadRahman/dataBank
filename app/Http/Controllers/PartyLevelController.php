<?php

namespace App\Http\Controllers;

use App\Party;
use App\PartyLevel;
use Illuminate\Http\Request;
use Session;
class PartyLevelController extends Controller
{
    public function index($partyid){
        $party=Party::findOrFail($partyid);
        $partyLevels=PartyLevel::get();


        return view('partyLevel',compact('partyLevels','party'));
    }

    public function insert(Request $r){
        $level=new PartyLevel();
        $level->name=$r->name;
        $level->save();
        Session::flash('message', 'Party-Level Added Successfully!');
        return back();
    }

    public function edit(Request $r){
        $partyLevels=PartyLevel::findOrFail($r->id);
        return view('partylevel.edit',compact('partyLevels'));

    }

    public function update(Request $r){
        $partyLevels=PartyLevel::findOrFail($r->id);
        $partyLevels->name=$r->name;
        $partyLevels->save();
        Session::flash('message', 'Party-Level Updated Successfully!');
        return back();
    }
}