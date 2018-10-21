<?php

namespace App\Http\Controllers;


use App\Party;
use App\Promoter;
use Illuminate\Http\Request;
use Session;
use Auth;
class PromoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view($id)
    {

        $getPromotersDetails = Promoter::select('party.partyName', 'promoters.name as promoterName', 'promoters.phoneNumber', 'promoters.promotersId',
            'promoters.remark', 'promoters.image', 'promoters.profile')
            ->leftJoin('party', 'party.partyId', 'promoters.party')->findOrFail($id);


        return view('promoters.index', compact('getPromotersDetails'));
    }

    public function add($id)
    {

        $allParties = Party::select('partyId', 'partyName')->get();

        return view('promoters.add', compact('allParties', 'id'));
    }

    public function insert(Request $r)
    {

        if ($r->promoterForm == "1") {

            $promoters = new Promoter();

            $promoters->name = $r->name;
            $promoters->phoneNumber = $r->phoneNumber;
            $promoters->party = $r->party;
            $promoters->remark = $r->remark;
            $promoters->candidateId = $r->candidateId;
            $promoters->createdAt = date('Y-m-d H:m:s');
            $promoters->createdBy = Auth::user()->userId;
            $promoters->save();

            if ($r->hasFile('image')) {
                $img = $r->file('image');
                $filename = $promoters->associateId . 'Image' . '.' . $img->getClientOriginalExtension();
                $promoters->image = $filename;
                $location = public_path('promoter/promoterImages/' . $filename);
                Image::make($img)->save($location);
                $location2 = public_path('promoter/promoterImages/thumb/' . $filename);
                Image::make($img)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location2);
            }
            $promoters->save();


        } elseif ($r->associateForm == "2") {

            $promoters = new Promoter();

            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $promoters->associateId . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $promoters->profile = $filename;
                $location = public_path('promoter/profileDoc/' . $filename);
                Image::make($img)->save($location);

            }
            $promoters->save();


        }


        Session::flash('message', 'Promoter Added Successfully!');

        return back();


    }

    public function edit($id)
    {

        $allParties = Party::select('partyId', 'partyName')->get();

        $getPromotersDetails = Promoter::select('promoters.name as promoterName', 'promoters.phoneNumber', 'promoters.promotersId',
            'promoters.remark', 'promoters.image', 'promoters.profile', 'promoters.party')->findOrFail($id);

        return view('promoters.edit', compact('allParties', 'getPromotersDetails'));

    }

    public function update(Request $r)
    {

        $promoters = Promoter::findOrFail($r->promoterId);

        if ($r->promoterForm == "1") {

            $promoters->name = $r->name;
            $promoters->phoneNumber = $r->phoneNumber;
            $promoters->party = $r->party;
            $promoters->remark = $r->remark;
            $promoters->profile = null;
            $promoters->updatedAt = date('Y-m-d H:m:s');
            $promoters->updatedAt = Auth::user()->userId;

            if ($r->hasFile('image')) {
                $img = $r->file('image');
                $filename = $r->associateId . 'Image' . '.' . $img->getClientOriginalExtension();
                $promoters->image = $filename;
                $location = public_path('promoter/promoterImages/' . $filename);
                Image::make($img)->save($location);
                $location2 = public_path('promoter/promoterImages/thumb/' . $filename);
                Image::make($img)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location2);
            }
            $promoters->save();


        } elseif ($r->associateForm == "2") {


            if ($r->hasFile('uploadDoc')) {
                $img = $r->file('uploadDoc');
                $filename = $r->associateId . 'uploadDoc' . '.' . $img->getClientOriginalExtension();
                $promoters->profile = $filename;
                $location = public_path('promoter/profileDoc/' . $filename);
                Image::make($img)->save($location);

            }
            $promoters->save();


        }


        Session::flash('message', 'Promoter Updated Successfully!');

        return redirect()->route('promoter.view', $r->promoterId);
    }

    public function delete(Request $r){

        Promoter::destroy($r->id);
        Session::flash('message', 'Promoter Deleted Successfully');
    }
}
