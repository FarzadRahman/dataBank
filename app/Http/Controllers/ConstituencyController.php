<?php

namespace App\Http\Controllers;

use App\Center;
use App\Constituency;
use App\Division;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Yajra\DataTables\DataTables;
class ConstituencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){


        return view('constituency.index');
    }

    public function getConstituencyData(){
        $consitituency=Constituency::select('constituency.constituencyId','constituency.number','constituency.name','constituency.area','divisionName',
            DB::raw('(constituency.maleVoter+constituency.femaleVoter) as totalVoter'),
            DB::raw('COUNT(distinct center.centerId) as totalCenter'),DB::raw('COUNT(distinct candidate.candidateId) as totalCandidate'))
            ->leftJoin('division','division.divisionId','constituency.divisionId')
            ->leftJoin('center','center.constituencyId','constituency.constituencyId')
            ->leftJoin('candidate','candidate.constituencyId','constituency.constituencyId')
            ->groupBy('constituency.number')
            ->groupBy('constituency.constituencyId');
//            ->groupBy('center.constituencyId')
//            ->groupBy('candidate.constituencyId');
//            ->get();

        $datatables = Datatables::of($consitituency);
        return $datatables->make(true);

    }

    public function getConstituencyVoter(Request $r){
        $consitituency=Constituency::select('maleVoter','femaleVoter')
            ->findOrFail($r->id);

        return view('constituency.getConstituencyVoter',compact('consitituency'));

    }

    public function add(){
        $divisions=Division::select('divisionId','divisionName')->get();
        return view('constituency.add',compact('divisions'));
    }

    public function insert(Request $r){
//        return $r;
        $consituency=new Constituency();
        $consituency->number=$r->number;
        $consituency->name=$r->name;
        $consituency->area=$r->area;
        $consituency->divisionId=$r->divisionId;
        $consituency->maleVoter=$r->maleVoter;
        $consituency->femaleVoter=$r->femaleVoter;
        $consituency->createdBy=Auth::user()->userId;
        $consituency->save();

        Session::flash('message', 'Constituency Added Successfully!');

        return back();


    }

    public function edit($id){
        $consituency=Constituency::findOrFail($id);
        $divisions=Division::select('divisionId','divisionName')->get();
        $centers=Center::where('constituencyId',$id)->get();
        return view('constituency.edit',compact('divisions','consituency','centers'));

    }

    public function update(Request $r,$id){
        $consituency=Constituency::findOrFail($id);
        $consituency->number=$r->number;
        $consituency->name=$r->name;
        $consituency->area=$r->area;
        $consituency->divisionId=$r->divisionId;
        $consituency->maleVoter=$r->maleVoter;
        $consituency->femaleVoter=$r->femaleVoter;
        $consituency->createdBy=Auth::user()->userId;
        $consituency->save();

        Session::flash('message', 'Constituency Updated Successfully!');

        return back();
    }
}
