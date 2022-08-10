<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use App\Models\CallExperts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class callExpertController extends Controller
{

    public function callExpert()
    {
        return view('admin.Home.call_our_experts');
    }

    public function addCallExperts(Request $request)
    {
        //validating data
         $request->validate([
            'description' => 'required|max:30',
            'telephone' =>'required'
        ],[
            'description.required' =>'You need to add a valid description',
            'telephone.required'=>'add a valid phone number'
        ]);
        CallExperts::insert([
            'description'=> $request->description,
            'telephone'=>$request->telephone,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('primary', 'contact successfully added');
    }
}
