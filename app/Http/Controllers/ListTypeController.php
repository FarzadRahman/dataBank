<?php

namespace App\Http\Controllers;

use App\Allfile;
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
//        return $r;
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

        if ($partyLevels== 7){

            $file=Allfile::where('partyId',$partyId)->where('listtypeId',$listType)->get();
            return view('fileView',compact('partyId','partyLevels','listType','file'));
        }



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
            $mohanogorFile->remark=$r->remark;
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



        }
        elseif ($partyLevels== 1){

            $jatio= new JatioFile();

            $jatio->listtypeId=$listType;
            $jatio->name=$r->uploadDocName;
            $jatio->remark=$r->remark;
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
        elseif($partyLevels== 7){

            $allFile= new Allfile();
            $allFile->remark=$r->remark;
            $allFile->listtypeId=$listType;
            $allFile->name=$r->uploadDocName;
            $allFile->partyId=$partyId;
            $allFile->createdAt=date('Y-m-d H:m:s');
            $allFile->createdBy=Auth::user()->userId;

            $allFile->save();

            if($r->hasFile('uploadDoc')){

                $img = $r->file('uploadDoc');
                $filename= $allFile->allfileId.'files'.'.'.$img->getClientOriginalExtension();
                $allFile->image=$filename;
                $location = public_path('allfiles/');
                $img->move($location,$filename);

            }
            $allFile->save();

        }
        elseif ($partyLevels== 3){

            $newArray=array('zilaId'=>$r->zilaId);

            $sendData=array_push($sendData,$newArray);

            $zilaId=$r->zilaId;

            $zila= new Zillafile();
            $zila->remark=$r->remark;
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
            $upZzila->remark=$r->remark;
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
            $pouroshovaFile->remark=$r->remark;
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
            $unionFile->remark=$r->remark;
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

    public function editJatioFile(Request $r){
         $jation=JatioFile::findOrFail($r->id);
          return view('editJatioFile',compact('jation'));
    }

    public function updateJationFile(Request $r){
        $jation=JatioFile::findOrFail($r->id);
        $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',1);
        Session::flash('message', 'File Edited Successfully!');
        return back();
    }

    public function deleteJatioFile(Request $r){
        $jation=JatioFile::findOrFail($r->id);
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',1);
        Session::flash('message', 'File Deleted Successfully!');
        $jation->delete();

    }

    public function editAllFile(Request $r){
        $jation=Allfile::findOrFail($r->id);
        return view('editAllFile',compact('jation'));
    }

    public function updateAllFile(Request $r){
        $jation=Allfile::findOrFail($r->id);
        $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',7);
        Session::flash('message', 'File Edited Successfully!');

        return back();
        
    }

    public function deleteAllFile(Request $r){
        $jation=Allfile::findOrFail($r->id);

        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',7);
        Session::flash('message', 'File Deleted Successfully!');
        $jation->delete();

    }


    public function editMohanogorFile(Request $r){
         $jation=MohanogorFile::findOrFail($r->id);
    
        return view('editMohanogorFile',compact('jation'));
    }


    public function updateMohanogor(Request $r){

    
         $jation=MohanogorFile::findOrFail($r->id);
        $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',2);
        Session::flash('message', 'File Edited Successfully!');
        return back();
    }


    public function deleteMohanogorFile(Request $r){
        $mohanogor=MohanogorFile::findOrFail($r->id);
        Session::flash('listType',$mohanogor->listtypeId);
        Session::flash('partyLevels',2);
        Session::flash('message', 'File Deleted Successfully!');
        $mohanogor->delete();
    }


    public function editZillaFile(Request $r){
         $jation=Zillafile::findOrFail($r->id);
         return view('editZillaFile',compact('jation'));
    }

    public function updateZillaFile(Request $r){
           $jation=Zillafile::findOrFail($r->id);
        $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',3);
        Session::flash('zillaId',$jation->zillaId);
        Session::flash('message', 'File Edited Successfully!');
          return back();
    }

    public function deleteZillaFile(Request $r){
        $zilla=Zillafile::findOrFail($r->id);
        Session::flash('listType',$zilla->listtypeId);
        Session::flash('partyLevels',3);
        Session::flash('zillaId',$zilla->zillaId);
        Session::flash('message', 'File Deleted Successfully!');
        $zilla->delete();
    }


    public function editUpZillaFile(Request $r){
           $jation=Upzillafile::findOrFail($r->id);
            return view('editUpZillaFile',compact('jation'));
    }

    public function updateUpZillaFile(Request $r){
        $jation=Upzillafile::findOrFail($r->id);
        $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtype_listtypeId);
        Session::flash('partyLevels',4);
        Session::flash('upzilaId',$jation->upzilla_upzillaId);
        Session::flash('message', 'File Edited Successfully!');
        return back();
    }

    public function deleteUpZillaFile(Request $r){
        $upzilla=Upzillafile::findOrFail($r->id);
        Session::flash('listType',$upzilla->listtype_listtypeId);
        Session::flash('partyLevels',4);
        Session::flash('upzilaId',$upzilla->upzilla_upzillaId);
        Session::flash('message', 'File Deleted Successfully!');
        $upzilla->delete();
    }


    public function editPouroshovaFile(Request $r){
        $jation=Pouroshovafile::findOrFail($r->id);
         return view('editPouroshovaFile',compact('jation'));
    }

    public function updatePouroshovaFile(Request $r){
         $jation=Pouroshovafile::findOrFail($r->id);
          $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
         Session::flash('listType',$jation->isttypeId);
        Session::flash('partyLevels',5);
        Session::flash('pouroshovaId',$jation->pouroshovaId);
        Session::flash('message', 'File Edited Successfully!');
        return back();
    }

    public function deletePouroshovaFile(Request $r){
        $pourosova=Pouroshovafile::findOrFail($r->id);
        Session::flash('listType',$pourosova->isttypeId);
        Session::flash('partyLevels',5);
        Session::flash('pouroshovaId',$pourosova->pouroshovaId);
        Session::flash('message', 'File Deleted Successfully!');
        $pourosova->delete();

    }

    public function editUnionFile(Request $r){
        $jation=Unionfile::findOrFail($r->id);

         return view('editUnionFile',compact('jation'));
    }
    public function updateUnionFile( Request $r){
            $jation=Unionfile::findOrFail($r->id);
             $jation->name=$r->name;
        $jation->remark=$r->remark;
        $jation->save();
        Session::flash('listType',$jation->listtypeId);
        Session::flash('partyLevels',6);
        Session::flash('unionId',$jation->unionfileId);
        Session::flash('message', 'File Edited Successfully!');
          return back();
    }
    public function deleteUnionFile(Request $r){
        $union=Unionfile::findOrFail($r->id);
        Session::flash('listType',$union->listtypeId);
        Session::flash('partyLevels',6);
        Session::flash('unionId',$union->unionfileId);
        Session::flash('message', 'File Deleted Successfully!');
        $union->delete();
    }


}