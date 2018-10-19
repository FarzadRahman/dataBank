<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstituencyController extends Controller
{
    public function index(){
        return view('constituency.index');
    }

    public function add(){
        return view('constituency.add');
    }
}
