<?php

namespace App\Http\Controllers;

use App\Union;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
class UnionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $unions=Union::select('unionId','unionName')->get();
        return view('union.index',compact('unions'));
    }
    public function insert(Request $r){
        $validatedData = $r->validate([
            'unionName' => 'required|unique:union,unionName|max:45'
        ]);
        $union=new Union();
        $union->unionName=$r->unionName;
        $union->createdBy=Auth::user()->userId;
        $union->save();
        Session::flash('message', 'union Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $union=union::findOrFail($r->id);

        return view('union.edit',compact('union'));
    }

    public function update(Request $r,$id){

        $validatedData = $r->validate([
            'unionName' => 'required|unique:union,unionName,'.$id.',unionId|max:45'
        ]);
        $union=Union::findOrFail($id);
        $union->unionName=$r->unionName;
        $union->updatedBy=Auth::user()->userId;
        $union->save();
        Session::flash('message', 'union Updated Successfully!');
        return back();
    }
}
