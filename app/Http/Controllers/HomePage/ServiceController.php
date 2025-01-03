<?php

namespace App\Http\Controllers\HomePage;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Website\HomePage\Services;

class ServiceController extends Controller
{
    public function allServices()
    {
        $all_services = Services::latest()->get();
        return view('admin.Home.services.all_service', compact('all_services'));
    }
    public function addService()
    {

        return view('admin.Home.services.add_service');
    }
    public function storeService(Request $request)
    {
        // $image = $request->file('service_image');
        // // 
        // $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        // Image::make($image)->resize(430, 327)->save('uploads/service_images/' . $name_gen);
        // $save_url = 'uploads/service_images/' . $name_gen;

        // if ($image !== null) {
        //     echo $image->getClientOriginalExtension();
        // }

        $request->validate([
            'service_title' => 'required',
            'service_summary' => 'required',
            'service_image' => 'required'
        ], [
            'service_title.required' => "A title is required for the Services you offer",
            'service_summary.required' => "Please summarize your service",
            'service_image.required' => "Please include an image"
        ]);

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service_images/', $filename);
            Image::make(public_path('uploads/service_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }

        Services::insert([

            'service_title' => $request->service_title,

            'service_summary' => $request->service_summary,
            'experts_image' => 'uploads/service_images/' . $filename,

            // 'service_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        // toast('Service Added Successfully!', 'success');
        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('ed.services');
    }

    public function deleteService($id)
    {
        Services::FindOrFail($id)->delete();
        toast('Service Deleted ', 'success', 'top-right')->hideCloseButton();

        return redirect()->route('all.services');
    }

    public function editService($id)
    {
        $edit_service = Services::FindOrFail($id);
        return view('admin.Home.services.edit_service', compact('edit_service'));
    }
    public function updateService(Request $request)
    {
        $service_id = $request->id;
       

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service_image/', $filename);
            Image::make(public_path('uploads/service_images/' . $filename))->fit(400, 400)->save();

            Services::FindOrFail($service_id)->update([

                'service_title' => $request->service_title,
                'service_summary' => $request->service_summary,
                'experts_image' => 'uploads/service_images/' . $filename,

                // 'service_image' => $save_url,
            ]);
            toast('Service Successfully with Image', 'success', 'top-right')->hideCloseButton();
            return redirect()->route('all.services');
            // ->with('info', 'Blog Updated Successfully with Image');
        } else {
            Services::FindOrFail($service_id)->update([

                'service_title' => $request->service_title,
                'service_summary' => $request->service_summary,

            ]);
            toast('Service Successfully Without Service Image', 'success', 'top-right')->hideCloseButton();
            return redirect()->route('all.services');
            // ->with('info', 'Blog Updated Successfully without Blog Image');
        }
        //end of method

    }
}
