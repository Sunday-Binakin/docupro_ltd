<?php

namespace App\Http\Controllers\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services\Service;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Services.Service.create');
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
            'title' => 'required',
            'service_summary' => 'required',
            'service_body' => 'required',
            'service_cover_image' => 'required',
            
        ], [
            'title.required' => 'Please add a title',
            'service_summary.required' => 'Please add author of story',
          
            'service_body.required' => 'Please write about your services',
            'service_cover_image.required' => 'Please add an Image',

        ]);

        //handling how the image is stored
        if ($request->hasFile('service_cover_image')) {
            $file = $request->File('service_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service_cover_images/', $filename);
            Image::make(public_path('uploads/service_cover_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }

        Service::insert([
            'title' => $request->title,

            'service_summary' => $request->service_summary,
            'service_body' => $request->service_body,
            'service_cover_image' => 'uploads/service_cover_images/' . $filename,
            'created_at' => Carbon::now(),
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('service.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $show_service = Service::FindOrFail(1);
        return view('admin.Services.Service.show', compact('show_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        if ($request->hasFile('service_cover_image')) {
            $file = $request->file('service_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service_cover_images/', $filename);
            Image::make(public_path('uploads/service_cover_images/' . $filename))->fit(400, 400)->save();

            Service::FindOrFail($id)->update([
                'title' => $request->title,
               
                'story_summary' => $request->story_summary,
                'story_body' => $request->story_body,
                'cover_image' => 'uploads/service_cover_images/' . $filename,
               
                'updated_at' => Carbon::now(),

            ]);
            toast('Successfully Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            Service::FindOrFail($id)->update([
                'title' => $request->title,
               
                'story_summary' => $request->story_summary,
                'story_body' => $request->story_body,
                'updated_at' => Carbon::now(),

            ]);
            toast('Form Updated without Image ', 'success', 'top-right')->hideCloseButton();
        }
        
        return redirect()->route('service.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
