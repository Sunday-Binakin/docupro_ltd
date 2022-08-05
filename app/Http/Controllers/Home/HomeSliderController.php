<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;






class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        // $id = HomeSlider::id();
        $homeSlider  = HomeSlider::find(1);
        return view('admin.home_slider.home_slider_all', compact('homeSlider'));
    }
    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;

        if ($request->file('home_slider')) {
            $image = $request->file('home_slider');
            $name_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 852)->save('uploads/home_slider/' . $name_generation);

            $save_url = 'uploads/home_slider/' . $name_generation;

            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'title_summary' => $request->title_summary,
                'video_url' => $request->video_url,
                'home_slider' => $save_url,

            ]);
            return redirect()->back()->with('info', 'Update Was Successfully With Slider');
        } else {

            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'title_summary' => $request->title_summary,
                'video_url' => $request->video_url,

            ]);
            return redirect()->back()->with('info', 'Update Was Successfully Without Slider');
        }
    }
}
