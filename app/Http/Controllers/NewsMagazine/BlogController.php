<?php

namespace App\Http\Controllers\NewsMagazine;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NewsMagazine\Blog;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_all_blogs = Blog::latest()->get();
        return view('admin.News_and_Magazine.blogs.index', compact('show_all_blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.News_and_Magazine.blogs.create');
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
            'story_by' => 'required',
            'story_summary' => 'required',
            'story_body' => 'required',
            'cover_image' => 'required'
        ], [
            'title.required' => 'Please add a title',
            'story_by.required' => 'Please add author of story',
            'story_summary.required' => 'Please summarize the story',
            'story_body.required' => 'Please write the full story',
            'cover_image.required' => 'Please add an Image',

        ]);

        //handling how the image is stored
        if ($request->hasFile('cover_image')) {
            $file = $request->File('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/cover_images/', $filename);
            Image::make(public_path('uploads/cover_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }

        Blog::insert([
            'title' => $request->title,
            'story_by' => $request->story_by,
            'story_summary' => $request->story_summary,
            'story_body' => $request->story_body,
            'cover_image' => 'uploads/cover_images/' . $filename,
            'created_at' => Carbon::now(),
        ]);

        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('blog.index');
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
        $edit_story = Blog::FindOrFail($id);
        return view('admin.News_and_Magazine.blogs.edit', compact('edit_story'));
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
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/cover_images/', $filename);
            Image::make(public_path('uploads/cover_images/' . $filename))->fit(400, 400)->save();

            Blog::FindOrFail($id)->update(['title' => $request->title,
                'story_by' => $request->story_by,
                'story_summary' => $request->story_summary,
                'story_body' => $request->story_body,
                'cover_image' => 'uploads/cover_images/' . $filename,
                'updated_at' => Carbon::now(),

            ]);
            toast('Successfully Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {

            Blog::FindOrFail($id)->update(['title' => $request->title,
                'story_by' => $request->story_by,
                'story_summary' => $request->story_summary,
                'story_body' => $request->story_body,
                'updated_at' => Carbon::now(),

            ]);
            toast('Form Updated without Image ', 'success', 'top-right')->hideCloseButton();
        }
        toast('Updated with out change of Image ', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::FindOrFail($id)->delete();
        toast('Deleted ', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('blog.index');
    }
}
