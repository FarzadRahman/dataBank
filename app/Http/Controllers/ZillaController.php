<?php

namespace App\Http\Controllers;

use App\Zilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
class ZillaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $zillas=Zilla::select('zillaId','zillaName')->get();
        return view('zilla.index',compact('zillas'));
    }
    public function insert(Request $r){
        $validatedData = $r->validate([
            'zillaName' => 'required|unique:zilla,zillaName|max:45'
        ]);
        $zilla=new Zilla();
        $zilla->zillaName=$r->zillaName;
        $zilla->createdBy=Auth::user()->userId;
        $zilla->save();
        Session::flash('message', 'Zilla Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $zilla=Zilla::findOrFail($r->id);

        return view('zilla.edit',compact('zilla'));
    }

    public function update(Request $r,$id){

        $validatedData = $r->validate([
            'zillaName' => 'required|unique:zilla,zillaName,'.$id.',zillaId|max:45'
        ]);
        $zilla=Zilla::findOrFail($id);
        $zilla->zillaName=$r->zillaName;
        $zilla->updatedBy=Auth::user()->userId;
        $zilla->save();
        Session::flash('message', 'Zilla Updated Successfully!');
        return back();
    }
}
