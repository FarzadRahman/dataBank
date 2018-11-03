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
        $partyId=$r->Alldata['partyId'];
        $partyLevels=$r->Alldata['partyLevelId'];
        $listType=$r->Alldata['listTypeId'];



        if ($partyLevels == 3){

            $zilaId=$r->Alldata['zilaId'];
            $file=Zillafile::where('zillaId',$zilaId)->where('partyId',$partyId)->where('listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file','zilaId'));


        }
        if ($partyLevels == 4){

            $upzillaId=$r->Alldata['upzillaId'];
            $file=Upzillafile::where('upzilla_upzillaId',$upzillaId)->where('party_partyId',$partyId)->where('listtype_listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file','upzillaId'));


        }
        if ($partyLevels == 5){

            $pouroshovaId=$r->Alldata['pouroshovaId'];
            $file=Pouroshovafile::where('pouroshovaId',$pouroshovaId)->where('partyId',$partyId)->where('isttypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file','pouroshovaId'));


        }
        if ($partyLevels == 6){

            $unionId=$r->Alldata['unionId'];
            $file=Unionfile::where('unionId',$unionId)->where('partyId',$partyId)->where('listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file','unionId'));


        }

        if ($partyLevels== 2){
            $file=MohanogorFile::where('partyId',$partyId)->where('listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file'));
        }
        if ($partyLevels== 1){
            $file=JatioFile::where('partyId',$partyId)->where('listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file'));
        }

        //return $r->Alldata['zilaId'];


    }
    public function insert(Request $r){

        $partyId=$r->partyId;
        $partyLevels=$r->partyLevelId;
        $listType=$r->listTypeId;

        $sendData=array(
            'partyId'=>$partyId,
            'partyLevels'=>$partyLevels,
            'listType'=>$listType,
        );



        if ($partyLevels== 2){

            $mohanogorFile=new MohanogorFile();


            $mohanogorFile->listtypeId=$listType;
            $mohanogorFile->name=$r->uploadDocName;
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
            $jatio->name=$r->uploadDocName;
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

            $newArray=array('zilaId'=>$r->zilaId);

            $sendData=array_push($sendData,$newArray);

            $zilaId=$r->zilaId;

            $zila= new Zillafile();

            $zila->listtypeId=$listType;
            $zila->name=$r->uploadDocName;
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

            Session::flash('zillaId',$zilaId);

        }
        elseif ($partyLevels== 4){

            $newArray=array('upzilaId'=>$r->upZillaId);

            $sendData=array_push($sendData,$newArray);

            $upZilaId=$r->upZillaId;

            $upZzila= new Upzillafile();

            $upZzila->listtype_listtypeId=$listType;
            $upZzila->name=$r->uploadDocName;
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


            Session::flash('upzilaId',$upZilaId);

        }
        elseif ($partyLevels== 5){

            $newArray=array('pouroshovaFileId'=>$r->pouroshovaFileId);

            $sendData=array_push($sendData,$newArray);

            $pouroshovaFileId=$r->pouroshovaFileId;

            $pouroshovaFile= new Pouroshovafile();

            $pouroshovaFile->isttypeId=$listType;
            $pouroshovaFile->name=$r->uploadDocName;
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
            Session::flash('pouroshovaId',$pouroshovaFileId);

        }
        elseif ($partyLevels== 6){

            $newArray=array('unionIdId'=>$r->unionFileId);

            $sendData=array_push($sendData,$newArray);

            $unionIdId=$r->unionFileId;

            $unionFile= new Unionfile();

            $unionFile->listtypeId=$listType;
            $unionFile->name=$r->uploadDocName;
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
            Session::flash('unionId',$unionIdId);

        }
        Session::flash('listType',$listType);
        Session::flash('partyLevels',$partyLevels);
        Session::flash('message', 'File Added Successfully!');

        //return $sendData;

        return back()->with('data',$sendData);

    }

    public function insertModal(Request $r){

        return view('test');
    }


    public function deleteJatioFile(Request $r){
        $jation=JatioFile::findOrFail($r->id);
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',1);
        Session::flash('message', 'File Added Deleted!');
        $jation->delete();

    }
    public function deleteMohanogorFile(Request $r){
        $mohanogor=MohanogorFile::findOrFail($r->id);
        Session::flash('listType',$mohanogor->listtypeId);
        Session::flash('partyLevels',2);
        Session::flash('message', 'File Added Deleted!');
        $mohanogor->delete();
    }
    public function deleteZillaFile(Request $r){
        $zilla=Zillafile::findOrFail($r->id);
        Session::flash('listType',$zilla->listtypeId);
        Session::flash('partyLevels',3);
        Session::flash('zillaId',$zilla->zillaId);
        Session::flash('message', 'File Added Deleted!');
        $zilla->delete();
    }


    public function deleteUpZillaFile(Request $r){
        $upzilla=Upzillafile::findOrFail($r->id);
        Session::flash('listType',$upzilla->listtypeId);
        Session::flash('partyLevels',4);
        Session::flash('upzilaId',$upzilla->upzilla_upzillaId);
        Session::flash('message', 'File Added Deleted!');
        $upzilla->delete();
    }

    public function deletePouroshovaFile(Request $r){
        $pourosova=Pouroshovafile::findOrFail($r->id);
        Session::flash('listType',$pourosova->listtypeId);
        Session::flash('partyLevels',5);
        Session::flash('pouroshovaId',$pourosova->pouroshovaId);
        Session::flash('message', 'File Added Deleted!');
        $pourosova->delete();

    }

    public function deleteUnionFile(Request $r){
        $union=Unionfile::findOrFail($r->id);
        Session::flash('listType',$union->listtypeId);
        Session::flash('partyLevels',6);
        Session::flash('unionId',$union->unionfileId);
        Session::flash('message', 'File Added Deleted!');
        $union->delete();
    }


}