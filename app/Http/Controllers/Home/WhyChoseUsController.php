<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\WhyChoseUs;
use Illuminate\Http\Request;

class WhyChoseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_chose_us = WhyChoseUs::latest()->get();

        return view('admin.Home.why_chose_us.index', compact('all_chose_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Home.why_chose_us.create');
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
            'why_chose_us' => 'required'
        ], [
            'why_chose_us.required' => 'Please fill the text editor'
        ]);

        WhyChoseUs::insert([
            'why_chose_us' => $request->why_chose_us
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('why.chose.us.index');
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
        $edit_chose_us = WhyChoseUs::FindOrFail($id);
        return view('admin.Home.why_chose_us.edit', compact('edit_chose_us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update_id = $request->id;
        WhyChoseUs::FindOrFail($update_id)->update([
            'why_chose_us' => $request->why_chose_us
        ]);
        toast('Updated', 'success', 'top-right')->hideCloseButton();


        return redirect()->route('why.chose.us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WhyChoseUs::FindOrFail($id)->delete();
        toast('Deleted', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('why.chose.us.index');
    }
}
