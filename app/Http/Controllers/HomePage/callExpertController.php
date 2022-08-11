<?php

namespace App\Http\Controllers\HomePage;

use alert;
use Carbon\Carbon;
use App\Models\CallExperts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class callExpertController extends Controller
{

    public function callExpert()
    {
        $contacts = CallExperts::latest()->get();
        return view('admin.Home.call_our_experts', compact('contacts'));
    }

    public function addCallExperts(Request $request)
    {
        //validating data
        $request->validate([
            'description' => 'required|max:30',
            'telephone' => 'required'
        ], [
            'description.required' => 'You need to add a valid description',
            'telephone.required' => 'add a valid phone number'
        ]);
        CallExperts::insert([
            'description' => $request->description,
            'telephone' => $request->telephone,
            'created_at' => Carbon::now(),
        ]);
        alert()->success('Successfully Added')->persistent(true, false);
        // toast('Added Successfully','success','top-right')->hideCloseButton();
        return redirect()->back()->with('primary', 'contact successfully added');
    }

    public function editCallExperts($id)
    {
        $edit_call_experts = CallExperts::FindOrFail($id);
        return view('admin.Home.call_our_experts', compact('edit_call_experts'));
    }
    public function deleteCallExperts($id)
    {
        CallExperts::FindOrFail($id)->delete();
        // alert()->success('Successfully Deleted','Click Okay to close')->persistent(true,true);
        // example:
        // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
        // example:
        // alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton('Cancel', '#aaa');
        toast('Contact Deleted Successfully', 'success', 'top-right')->hideCloseButton();
        return redirect()->back()->with('primary', 'Successfully deleted');
    }
}
