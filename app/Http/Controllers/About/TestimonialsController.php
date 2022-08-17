<?php

namespace App\Http\Controllers\About;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Intervention\Image\Facades\Image;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_testimonies = Testimonials::latest()->get();
        return view('admin.About.Testimonials.index',compact('all_testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.About.Testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validatation
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'company_name'=>'required',
            'testimony'=>'required',
            'testimony_image'=>'required'
        ],[
            'name.required'=>'Please add your name',
            'position.required'=>'please fill your portfolio',
            'company_name.required'=>'Please enter your company name',
            'testimony.required'=>'Please fill the text editor',
            'testimony_image.required'=>'please add an image'
        ]);

        if ($request->hasFile('testimony_image')) {
            $file = $request->file('testimony_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/testimony_images/', $filename);
            Image::make(public_path('uploads/testimony_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }
        Testimonials::insert([
            'name' => $request->name,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'testimony' => $request->testimony,
            'testimony_image' => 'uploads/testimony_images/' . $filename,
            'created_at' => Carbon::now(),

        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('testimony.index');
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
        $edit_testimony = Testimonials::FindOrFail($id);
        return view('admin.About.Testimonials.edit', compact('edit_testimony'));
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
        if ($request->hasFile('testimony_image')) {
            $file = $request->file('testimony_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/testimony_images/', $filename);
            Image::make(public_path('uploads/testimony_images/' . $filename))->fit(400, 400)->save();

            Testimonials::FindOrFail($id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'company_name' => $request->company_name,
                'testimony' => $request->testimony,
                'testimony_image' => 'uploads/testimony_images/' . $filename,
                'created_at' => Carbon::now(),

            ]);
            toast('Successfully Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            Testimonials::insert([
                'name' => $request->name,
                'position' => $request->position,
                'company_name' => $request->company_name,
                'testimony' => $request->testimony,
                'updated_at' => Carbon::now(),

            ]);
            toast('Form Updated without Image ', 'success', 'top-right')->hideCloseButton();
        }

        return redirect()->route('testimony.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonials::FindOrFail($id)->delete();
        toast('Deleted ', 'success', 'top-right')->hideCloseButton();
    }
}
