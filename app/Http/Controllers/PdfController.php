<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    //
    public function  createpfd(){
        $candidate = Candidate::get();
    }
}
