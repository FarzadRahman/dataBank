<?php

namespace App\Http\Controllers;

use App\ListType;
use App\Party;
use App\PartyLevel;
use App\Zilla;
use App\Zillafile;
use Illuminate\Http\Request;
use Session;

class PartyLevelController extends Controller
{
    public function index($partyid){

        $party=Party::findOrFail($partyid);
        $partyLevels=PartyLevel::get();
        $listType=ListType::get();
        $allZila=Zilla::get();



        return view('partyLevel',compact('partyLevels','party','listType','allZila'));
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
