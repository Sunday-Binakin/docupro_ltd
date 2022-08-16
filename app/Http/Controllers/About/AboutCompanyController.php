<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_about_company = AboutCompany::latest()->get();
        return view('admin.About.About_company.index', compact('all_about_company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.About.About_company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'about_summary' => 'required',
            'about' => 'required'
        ], [
            'about.required' => 'Please fill the text editor',
            'about_summary.required' => 'Please fill the text editor'
        ]);

        AboutCompany::insert([
            'about_summary' => $request->about_summary,
            'about' => $request->about
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('about.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_about_company = AboutCompany::FindOrFail($id);
        return view('admin.About.About_company.edit',compact('edit_about_company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $update_id = $request->id;
        AboutCompany::FindOrFail($id)->update([
            'about_summary' => $request->about_summary,
            'about' => $request->about
        ]);
        toast('Updated', 'success', 'top-right')->hideCloseButton();


        return redirect()->route('about.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutCompany::FindOrFail($id)->delete();
        toast('Deleted', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('about.company.index');
    }
}
