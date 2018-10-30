<?php

namespace App\Http\Controllers;

use App\JatioFile;
use App\MohanogorFile;
use App\Party;
use App\PartyLevel;
use App\Zillafile;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Image;
class ListTypeController extends Controller
{
    public function getFileforList(Request $r){
        $partyId=$r->partyId;
        $partyLevels=$r->partyLevelId;
        $listType=$r->listTypeId;
        if ($r->zillaId){

        }
        if ($partyLevels== 2){
            $file=MohanogorFile::where('partyId',$partyId)->where('listtypeId',$listType)->first();
        }
        if ($partyLevels== 1){
            $file=JatioFile::where('partyId',$partyId)->where('listtypeId',$listType)->first();
        }
        if ($partyLevels== 3){

            $zilaId=$r->zillaId;
            $file=Zillafile::where('zillaId',$zilaId)->where('partyId',$partyId)->where('listtypeId',$listType)->first();
        }


        return view('fileView',compact('partyId','partyLevels','listType','file'));
    }
    public function insert(Request $r){

        $partyId=$r->partyId;
        $partyLevels=$r->partyLevelId;
        $listType=$r->listTypeId;



        if ($partyLevels== 2){

            $mohanogorFile=new MohanogorFile();


            $mohanogorFile->listtypeId=$listType;
            $mohanogorFile->partyId=$partyId;
            $mohanogorFile->createdAt=date('Y-m-d H:m:s');
            $mohanogorFile->createdBy=Auth::user()->userId;

            $mohanogorFile->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $mohanogorFile->mohanogorId.'files'.'.'.$img->getClientOriginalExtension();
                $mohanogorFile->image=$filename;
                $location = public_path('mohanogorfiles/');
                $img->move($location,$filename);

            }
            $mohanogorFile->save();



        }elseif ($partyLevels== 1){

            $jatio= new JatioFile();

            $jatio->listtypeId=$listType;
            $jatio->partyId=$partyId;
            $jatio->createdAt=date('Y-m-d H:m:s');
            $jatio->createdBy=Auth::user()->userId;

            $jatio->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $jatio->jatiofileId.'files'.'.'.$img->getClientOriginalExtension();
                $jatio->image=$filename;
                $location = public_path('jatiofiles/');
                $img->move($location,$filename);

            }
            $jatio->save();

        }
        elseif ($partyLevels== 3){

            $zilaId=$r->zilaId;

            $zila= new Zillafile();

            $zila->listtypeId=$listType;
            $zila->zillaId=$zilaId;
            $zila->partyId=$partyId;
            $zila->createdAt=date('Y-m-d H:m:s');
            $zila->createdBy=Auth::user()->userId;

            $zila->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $zila->zillafileId.'files'.'.'.$img->getClientOriginalExtension();
                $zila->image=$filename;
                $location = public_path('zilafiles/');
                $img->move($location,$filename);

            }
            $zila->save();

        }
        Session::flash('message', 'File Added Successfully!');

        return back();

    }


}
