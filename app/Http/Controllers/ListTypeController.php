<?php

namespace App\Http\Controllers;

use App\JatioFile;
use App\MohanogorFile;
use App\Party;
use App\PartyLevel;
use App\Pouroshovafile;
use App\Unionfile;
use App\Upzillafile;
use App\Zillafile;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Image;
class ListTypeController extends Controller
{
    public function getFileforList(Request $r){
<<<<<<< HEAD
        return $r;
        $partyId=$r->partyId;
        $partyLevels=$r->partyLevelId;
        $listType=$r->listTypeId;
        if ($r->zillaId){
=======

        //return $r->Alldata;

        $partyId=$r->Alldata['partyId'];
        $partyLevels=$r->Alldata['partyLevelId'];
        $listType=$r->Alldata['listTypeId'];



        if ($partyLevels == 3){

            $zilaId=$r->Alldata['zilaId'];
            $file=Zillafile::where('zillaId',$zilaId)->where('partyId',$partyId)->where('listtypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file','zilaId'));


        }
        if ($partyLevels == 4){

            $upzillaId=$r->Alldata['upzillaId'];
            $file=Upzillafile::where('upzilla_upzillaId',$upzillaId)->where('party_partyId',$partyId)->where('listtype_listtypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file','upzillaId'));


        }
        if ($partyLevels == 5){

            $pouroshovaId=$r->Alldata['pouroshovaId'];
            $file=Pouroshovafile::where('pouroshovaId',$pouroshovaId)->where('partyId',$partyId)->where('isttypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file','pouroshovaId'));

>>>>>>> 60d5b35fc38d1839e94eba2f73119faafb4d65c8

        }
        if ($partyLevels == 6){

            $unionId=$r->Alldata['unionId'];
            $file=Unionfile::where('unionId',$unionId)->where('partyId',$partyId)->where('listtypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file','unionId'));


        }

        if ($partyLevels== 2){
            $file=MohanogorFile::where('partyId',$partyId)->where('listtypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file'));
        }
        if ($partyLevels== 1){
            $file=JatioFile::where('partyId',$partyId)->where('listtypeId',$listType)->first();
            return view('fileView',compact('partyId','partyLevels','listType','file'));
        }

        //return $r->Alldata['zilaId'];


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
        elseif ($partyLevels== 4){

            $upZilaId=$r->upZillaId;

            $upZzila= new Upzillafile();

            $upZzila->listtype_listtypeId=$listType;
            $upZzila->upzilla_upzillaId=$upZilaId;
            $upZzila->party_partyId=$partyId;
            $upZzila->createdAt=date('Y-m-d H:m:s');
            $upZzila->createdBy=Auth::user()->userId;

            $upZzila->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $upZzila->upzillaId.'files'.'.'.$img->getClientOriginalExtension();
                $upZzila->image=$filename;
                $location = public_path('upzilafiles/');
                $img->move($location,$filename);

            }
            $upZzila->save();

        }
        elseif ($partyLevels== 5){

            $pouroshovaFileId=$r->pouroshovaFileId;

            $pouroshovaFile= new Pouroshovafile();

            $pouroshovaFile->isttypeId=$listType;
            $pouroshovaFile->pouroshovaId=$pouroshovaFileId;
            $pouroshovaFile->partyId=$partyId;
            $pouroshovaFile->createdAt=date('Y-m-d H:m:s');
            $pouroshovaFile->createdBy=Auth::user()->userId;

            $pouroshovaFile->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $pouroshovaFile->pouroshovaId.'files'.'.'.$img->getClientOriginalExtension();
                $pouroshovaFile->image=$filename;
                $location = public_path('pouroshovafies/');
                $img->move($location,$filename);

            }
            $pouroshovaFile->save();

        }
        elseif ($partyLevels== 6){

            $unionIdId=$r->unionFileId;

            $unionFile= new Unionfile();

            $unionFile->listtypeId=$listType;
            $unionFile->unionId=$unionIdId;
            $unionFile->partyId=$partyId;
            $unionFile->createdAt=date('Y-m-d H:m:s');
            $unionFile->createdBy=Auth::user()->userId;

            $unionFile->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $unionFile->unionfileId.'files'.'.'.$img->getClientOriginalExtension();
                $unionFile->image=$filename;
                $location = public_path('pouroshovafies/');
                $img->move($location,$filename);

            }
            $unionFile->save();

        }
        Session::flash('message', 'File Added Successfully!');

        return back();

    }

    public function insertModal(Request $r){
        return $r;
    }


}
