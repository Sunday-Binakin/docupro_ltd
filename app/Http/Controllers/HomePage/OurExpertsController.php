<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use App\Models\OurExperts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class OurExpertsController extends Controller
{
    public function allOurExperts()
    {
        $all_our_experts = OurExperts::latest()->get();
        return view('admin.Home.our_experts.all_our_experts', compact('all_our_experts'));
    }
    public function addOurExperts()
    {
        return view('admin.Home.our_experts.add_our_experts');
    }
    public function storeOurExperts(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'portfolio' => 'required',
            'experts_image' => 'required'
        ], [
            'name.required' => ' Please enter the name of your Expert',
            'portfolio.required' => 'Please enter the right portfolio',
            'experts_image.required' => 'Please enter the right format'
        ]);

        if ($request->hasFile('experts_image')) {
            $file = $request->file('experts_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/experts_image/', $filename);
            Image::make(public_path('uploads/experts_image/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }


        // $image = $request->file('experts_image');
        // // 
        // $name_gen = time() . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        // Image::make($image)->resize(430, 327)->save('uploads/experts_images/' . $name_gen);
        // $save_url = 'uploads/experts_images/' . $name_gen;

        // if ($image !== null) {
        //     echo $image->getClientOriginalExtension();
        // }

        OurExperts::insert([
            'name' => $request->name,
            'portfolio' => $request->portfolio,
            'experts_image' => 'uploads/experts_image/' . $filename,
            // 'experts_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('all.our.experts');
    }
    public function editOurExperts($id)
    {
        $edit_our_experts = OurExperts::FindOrFail($id);

        return view('admin.Home.our_experts.edit_our_experts', compact('edit_our_experts'));
    }
    public function deleteOurExperts($id)
    {
        OurExperts::FindOrFail($id)->delete();
        toast('Deleted! ', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('all.our.experts');
    }
    public function updateOurExperts( Request $request)
    {
        $experts_id = $request->id;

        if ($request->hasFile('experts_image')) {
            $file = $request->file('experts_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/experts_image/', $filename);
            Image::make(public_path('uploads/experts_image/' . $filename))->fit(400, 400)->save();

            OurExperts::FindOrFail($experts_id)->update([
                'name' => $request->name,
                'portfolio' => $request->portfolio,
                'experts_image' => 'uploads/experts_image/' . $filename,
            ]);
            toast('Successfully Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            OurExperts::FindOrFail($experts_id)->update([
                'name' => $request->name,
                'portfolio' => $request->portfolio
            ]);
            toast('Successfully Updated without  Image ', 'success', 'top-right')->hideCloseButton();
        }

        return redirect()->route('all.call.experts');
    }
}
