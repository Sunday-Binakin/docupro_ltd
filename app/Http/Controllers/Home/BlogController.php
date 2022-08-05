<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Image;

// use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $all_blog = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('all_blog'));
    }

    public function AddBlog()
    {
        //passing the category name from the blog category to blog table
        $categories = BlogCategory::orderBy('blog_category', 'asc')->get();
        return view('admin.blog.add_blog', compact('categories'));
    }

    public function StoreBlog(Request $request)
    {

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430, 327)->save('uploads/blog_images/' . $name_gen);
        $save_url = 'uploads/blog_images/' . $name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tag' => $request->blog_tag,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('all.blog')->with('info', 'Blog Inserted Successfully');
    }

    public function EditBlog($id)
    {
        $blog_edit = Blog::FindOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('blog_edit', 'categories'));
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::FindOrFail($id)->delete();

        return redirect()->back()->with('info', 'Blog Successfully deleted');
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(423, 327)->save('uploads/blog_images/' . $name_gen);
            $save_url = 'uploads/blog_images/' . $name_gen;

            Blog::FindOrFail($blog_id)->update([

                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tag' => $request->blog_tag,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);
            return redirect()->route('all.blog')->with('info', 'Blog Updated Successfully with Image');
        } else {
            Blog::FindOrFail($blog_id)->update([

                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tag' => $request->blog_tag,
                'blog_description' => $request->blog_description,

            ]);
            return redirect()->route('all.blog')->with('info', 'Blog Updated Successfully without Blog Image');
        }
    }//end of method


    public function BlogDetails($id)
    {
        $recent_blog = Blog::latest()->limit(5)->get();
       $blog_details = Blog::FindOrFail($id);
       $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
       return view('frontend.home_all.home_blog_details',compact('blog_details','recent_blog','categories'));
    }
    public function CategoryBlog($id)
    {
        $blog_post = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $all_blogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $category_name = BlogCategory::FindOrFail($id);
        return view('frontend.pages.category_blog_details',compact('blog_post','all_blogs','categories','category_name'));
    }
    public function HomeBlog()
    {
        $all_blogs = Blog::latest()->paginate(3);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
    return view('frontend.pages.blog',compact('all_blogs','categories'));
    }
}
