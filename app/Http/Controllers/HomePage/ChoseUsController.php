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
    public function updateWhyChoseUs(Request $request)
    {
        $update_id = $request->id;
        ChoseUs::FindOrFail($update_id)->update([
            'title' => $request->title,
            'short_summary' => $request->short_summary,
            'summary' => $request->summary
        ]);
        toast('Updated Successfully', 'success', 'top-right')->hideCloseButton();
       // toast('Updated Successfully', 'success', 'top-right')->hideCloseButton();
       return  redirect()->route('all.why.chose.us');
       
    }
    public function editWhyChoseUs($id)

    {
        $edit_chose_us = ChoseUs::FindOrFail($id);
        return view('admin.Home.why_chose_us.edit_why_chose_us', compact('edit_chose_us'));
    }

    public function deleteWhyChoseUs($id)
    {
        ChoseUs::FindOrFail($id)->delete();
        // toast('Deleted !', 'success');
        toast('Deleted Successfully', 'success', 'top-right')->hideCloseButton();

        return redirect()->route('all.why.chose.us');
    }
}
