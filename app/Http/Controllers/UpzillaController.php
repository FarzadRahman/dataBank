<?php

namespace App\Http\Controllers;

use App\Upzilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
class UpzillaController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $upzillas=Upzilla::select('upzillaId','upzillaName')->get();
        return view('upzilla.index',compact('upzillas'));
    }
    public function insert(Request $r){
        $validatedData = $r->validate([
            'upzillaName' => 'required|unique:upzilla,upzillaName|max:45'
        ]);
        $upzilla=new Upzilla();
        $upzilla->upzillaName=$r->upzillaName;
        $upzilla->createdBy=Auth::user()->userId;
        $upzilla->save();
        Session::flash('message', 'Upzilla Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $upzilla=upzilla::findOrFail($r->id);

        return view('upzilla.edit',compact('upzilla'));
    }

    public function update(Request $r,$id){

        $validatedData = $r->validate([
            'upzillaName' => 'required|unique:upzilla,upzillaName,'.$id.',upzillaId|max:45'
        ]);
        $upzilla=upzilla::findOrFail($id);
        $upzilla->upzillaName=$r->upzillaName;
        $upzilla->updatedBy=Auth::user()->userId;
        $upzilla->save();
        Session::flash('message', 'upzilla Updated Successfully!');
        return back();
    }
}
