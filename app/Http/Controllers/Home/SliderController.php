<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_all = Slider::latest()->get();

        return view('admin.Home.Slider.index',compact('show_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Home.Slider.create');
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
            'image_tag' => 'required',
            'url' => 'required',
            'slider_image' => 'required'
        ], [
            'image_tag.required' => 'Add Image Tag ',
            'url.required' => 'Add URL',
            'slider_image.required' => 'Add an Image'
        ]);

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/slider_images/', $filename);
            Image::make(public_path('uploads/slider_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }
        Slider::insert([
            'image_tag' => $request->image_tag,
            'url' => $request->url,
            'slider_image' => 'uploads/slider_images/' . $filename,
            'created_at' => Carbon::now(),
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_slider = Slider::FindOrFail($id);
        return view('admin.Home.Slider.edit',compact('edit_slider'));
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
        $slider_id = $request->id;

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/slider_images/', $filename);
            Image::make(public_path('uploads/slider_images/' . $filename))->fit(400, 400)->save();

            Slider::FindOrFail($slider_id)->update([
                'image_tag' => $request->image_tag,
                'url' => $request->url,
                'slider_image' => 'uploads/slider_images/' . $filename,
                'created_at' => Carbon::now(),
            ]);
            toast('Successfully Updated with Slider Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            Slider::FindOrFail($slider_id)->update([
                'image_tag' => $request->image_tag,
                'url' => $request->url,

            ]);
            toast('Form Updated without Slider Image ', 'success', 'top-right')->hideCloseButton();
        }

        return redirect()->route('slider.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::FindOrFail($id)->delete();
        toast('Deleted! ', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('slider.index');
    }
}
