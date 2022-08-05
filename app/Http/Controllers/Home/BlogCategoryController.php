<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Carbon\Carbon;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_category', compact('blogCategory'));
    }
    public function AddBlogCategory()
    {
        return view('admin.blog_category.add_blog_category');
    }
    public function StoreBlogCategory(Request $request)
    {

        //validation message
        $request->validate(
            [
                'blog_category' => 'required',

            ],
            // [
            //     'blog_category.required' => 'Blog Category is Required',

            // ]
        );;

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            //'created_at' => Carbon::now(),

        ]);
        return redirect()->route('all.blog.category')->with('info', 'Blog Category Was Added Successful');
    }

    public function EditBlogCategory($id)
    {
        $blog_category = BlogCategory::FindOrFail($id);
        return view('admin.blog_category.edit_blog_category', compact('blog_category'));
    }

    public function UpdateBlogCategory(Request $request)
    {
        $blog_category_id = $request->id;

        BlogCategory::FindOrFail($blog_category_id)->update([
            'blog_category' =>$request->blog_category,
        ]);
        return redirect()->route('all.blog.category')->with('info','Blog Category Update Successfully');
    }
    public function DeleteBlogCategory($id)
    {
        BlogCategory::FindOrFail($id)->delete();
        return redirect()->back()->with('info', 'Blog Category Was Deleted Successfully');
    }
}
