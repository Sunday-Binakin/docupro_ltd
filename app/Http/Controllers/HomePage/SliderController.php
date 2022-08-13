<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function allsliders()
    {
        $all_sliders = Slider::latest()->get();
        return view('admin.Home.slider.all_sliders', compact('all_sliders'));
    }

    public function addsliders()
    {

        return view('admin.Home.slider.add_slider');
    }

    public function storeSlider(Request $request)
    {

        $image = $request->file('image_slider');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430, 327)->save('uploads/image_sliders/' . $name_gen);
        $save_url = 'uploads/image_sliders/' . $name_gen;

        if ($image !== null) {
            echo $image->getClientOriginalExtension();
        }
        //validating data
        $request->validate([
            'title' => 'required|max:30',
            'summary' => 'required',
            // 'image_slider' => 'required'
        ], [
            'title.required' => 'Add a Title ',
            'summary.required' => 'Add Summary',
            // 'image_slider.required' => 'Add an Image'
        ]);
        Slider::insert([
            'title' => $request->title,
            'summary' => $request->summary,
            'image_slider' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        alert()->success('Successfully Added')->persistent(true, false);
        return redirect()->route('all.sliders');
    }

    public function deleteSlider($id)
    {
        Slider::FindOrFail($id)->delete();

        toast('Deleted Successfully', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('all.sliders');
    }

    public function editSlider($id)
    {
        $edit_slider = Slider::FindOrFail($id);
        return view('admin.Home.slider.edit_slider', compact('edit_slider'));
    }

    public function updateSlider(Request $request)
    {
        $slider_id = $request->id;
        if ($request->file('image_slider')) {
            $image = $request->file('slider_slider');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(423, 327)->save('uploads/image_sliders/' . $name_gen);
            $save_url = 'uploads/image_slider/' . $name_gen;

            Slider::FindOrFail($slider_id)->update([

                'title' => $request->title,
                'summary' => $request->summary,
                'image_slider' => $save_url,
            ]);
            toast('Service Successfully with Slider Image', 'success', 'top-right')->hideCloseButton();
            return redirect()->route('all.sliders');
        } else {
            Slider::FindOrFail($slider_id)->update([

                'title' => $request->title,
                'summary' => $request->summary,

            ]);
            toast('Service Successfully Without Slider', 'success', 'top-right')->hideCloseButton();
            return redirect()->route('all.sliders');
        }
        //end of method
    }
}
