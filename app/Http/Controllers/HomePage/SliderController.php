<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
        //validating data
        $request->validate([
            'title' => 'required|max:30',
            'summary' => 'required'
        ], [
            'title.required' => 'Add a Title ',
            'summary.required' => 'Add Summary'
        ]);
        Slider::insert([
            'title' => $request->title,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);
        alert()->success('Successfully Added')->persistent(true, false);
        return redirect()->route('all.sliders');
    }

    public function deleteSlider($id)
    {
        Slider::FindOrFail($id)->delete();

        toast('Deleted Successfully', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('add.image');
    }
}
