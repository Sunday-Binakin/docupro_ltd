<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function allSliders()
    {
      $all_sliders = Slider::all();
      return view('admin.Home.slider.slider', compact('all_sliders'));
    }
    public function addSlider(Request $request)
    {
        // $slider_id = $request->id;

        if ($request->file('image_slider')) {
            $image = $request->file('image_slider');
            $name_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 852)->save('uploads/slider/' . $name_generation);

            $save_url = 'uploads/slider/' . $name_generation;

            $request->validate([
                'image_slider' => 'required',
                // 'summary' => 'required',

            ], [
                'image_slider.required' => ' slider is required',
                //'summary.required' => 'summary is required',
                //'image_1.required' => 'At least 1 image is required',
            ]);

            Slider::insert([
                'title' => $request->title,
                'summary' => $request->summary,
                'image_slider' =>$save_url,
                'created_at' => Carbon::now(),


            ]);
            // example:
            toast('Slider Added Successfully', 'success', 'top-right')->showCloseButton();

            return redirect()->back();
        }
    }
}
