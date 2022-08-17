<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\PurposeStatement;
use Illuminate\Http\Request;

class PurposeStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.About.Purpose_statement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'mission'=>'required',
            'vision'=>'required',
            'values'=>'required'
        ],[
            'mission.required' => 'Please fill the editor',
            'vision.required'=>'Please fill the editor',
            'values.required'=>'Please fill the editor'
        ]);
        PurposeStatement::insert([
            'mission'=>$request->mission,
            'vision'=>$request->vision,
            'values'=>$request->values
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('purpose.statement.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $edit_purpose_statement = PurposeStatement::FindOrFail(1);
        return view('admin.About.Purpose_statement.show', compact('edit_purpose_statement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
