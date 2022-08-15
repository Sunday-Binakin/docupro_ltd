<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\ChoseUs;
use Illuminate\Http\Request;

class ChoseUsController extends Controller
{
    public function allWhyChoseUs()
    {
        $all = ChoseUs::latest()->get();
        return view('admin.Home.why_chose_us.all_why_chose_us', compact('all'));
    }

    public function addWhyChoseUs()
    {
        return view('admin.Home.why_chose_us.add_why_chose_us');
    }
    public function storeWhyChoseUs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_summary' => 'required',
            'summary' => 'required'
        ], [
            'title.required' => 'Please enter a short title',
            'short_summary.required' => 'A summarized Title is required',
            'Summary.required' => ' A long summary why clients should chose you'
        ]);

        ChoseUs::insert([
            'title' => $request->title,
            'short_summary' => $request->short_summary,
            'summary' => $request->summary
        ]);
        alert()->success('Successfully Added')->persistent(true, false);
        // toast('Successfully Added !', 'success');
        return  redirect()->route('all.why.chose.us');
    }

    public function editWhyChoseUs()
    {
        # code...
    }

    public function deleteWhyChoseUs()
    {
    }
}
