<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Services\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
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
        $show_all_service_categories = ServiceCategory::latest()->get();
        return view('admin.Services.service_category.create',compact('show_all_service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // handling validation
        $request->validate([
            'name' => 'required|unique:service_categories,name'
        ], [
            'name.required' => 'what type of service do you offer'
        ]);

        ServiceCategory::insert([
            'name' => $request->name,
        ]);
        alert()->success('Successfully Added')->persistent(true, false);
        return redirect()->route('service.category.create');
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
        $edit_service_category = ServiceCategory::FindOrFail($id);
        return view('admin.Services.service_category.edit', compact('edit_service_category'));
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

        ServiceCategory::FindOrFail($id)->update([
            'name'=>$request->name,
        ]);
        toast('Updated', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('service.category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceCategory::FindOrFail($id)->delete();
        toast('Deleted', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('service.category.create');
    }
}
