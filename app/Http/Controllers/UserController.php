<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Hash;
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user=User::get();
        $usertype =UserType::get();
        return view('user.index',compact('user', 'usertype'));
    }


    public function insert(Request $r){
        $validatedData = $r->validate([
            'email' => 'required|unique:user,email|max:45',
            'name' => 'required|max:45',
            'password' => 'required|max:255',

        ]);
        $user=new User();
        $user->name=$r->name;
        $user->userName=$r->userName;
        $user->email=$r->email;
        $user->userTypeId=$r->usertypeid;
        $user->password=Hash::make($r->password);
        $user->createdBy=Auth::user()->userId;
       // $user->createdBy=date('Y-m-d H:m:d');
        $user->save();
        Session::flash('message', 'User Added Successfully!');
        return back();

    }

    public function edit(Request $r){
        $user=User::findOrFail($r->id);

        return view('user.edit',compact('user'));
    }

    public function update(Request $r,$id)
    {
//
//        $validatedData = $r->validate([
//            'partyName' => 'required|unique:party,partyName,'.$id.',partyId|max:45'
//        ]);
//        $user=Division::findOrFail($id);
//        $user->partyName=$r->partyName;
//        $user->updatedBy=Auth::user()->userId;
//        $user->save();
//        Session::flash('message', 'User Updated Successfully!');
//        return back();
//    }
    }
}
