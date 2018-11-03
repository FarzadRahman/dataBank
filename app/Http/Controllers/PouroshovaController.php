<?php

namespace App\Http\Controllers;

use App\Pouroshova;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class PouroshovaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $pouroshovas=Pouroshova::select('pouroshovaId','pouroshovaName')->get();
        return view('pouroshova.index',compact('pouroshovas'));
    }
    public function insert(Request $r){
        $validatedData = $r->validate([
            'pouroshovaName' => 'required|max:45'
        ]);
        $pouroshova=new pouroshova();
        $pouroshova->pouroshovaName=$r->pouroshovaName;
        $pouroshova->createdBy=Auth::user()->userId;
        $pouroshova->save();
        Session::flash('message', 'pouroshova Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $pouroshova=pouroshova::findOrFail($r->id);

        return view('pouroshova.edit',compact('pouroshova'));
    }

    public function update(Request $r,$id){

        $validatedData = $r->validate([
            'pouroshovaName' => 'required|max:45'
        ]);
        $pouroshova=Pouroshova::findOrFail($id);
        $pouroshova->pouroshovaName=$r->pouroshovaName;
        $pouroshova->updatedBy=Auth::user()->userId;
        $pouroshova->save();
        Session::flash('message', 'Pouroshova Updated Successfully!');
        return back();
    }
}
