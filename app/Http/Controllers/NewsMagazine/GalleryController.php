<?php

namespace App\Http\Controllers\NewsMagazine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsMagazine\Gallery;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
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
        return view('admin.News_and_Magazine.gallery.create');
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
            'image_description' => 'required',
            'image' => 'required'
        ], [
            'image_description.required' => 'Please add description',
            'image' => 'Please add an image'
        ]);

        //handling how the image is stored
        if ($request->hasFile('gallery_image')) {
            $file = $request->File('gallery_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/gallery_images/', $filename);
            Image::make(public_path('uploads/gallery_image/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }

        Gallery::insert([
            'image_description' => $request->image_description,
            'image' => 'uploads/gallery_images/' . $filename,
            'created_at' => Carbon::now(),
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('gallery.index');
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
