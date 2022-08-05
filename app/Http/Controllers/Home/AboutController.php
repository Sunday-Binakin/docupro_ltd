<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Image;

class AboutController extends Controller
{
    public function AboutPage()
    {
        //we are getting specifically 1 id data
        $aboutPage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }

    public function UpdateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(523, 605)->save('uploads/home_about/'
             . $name_generation);

            $save_url = 'uploads/home_about/' . $name_generation;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]);
            return redirect()->back()->with('info', 'Update Was Successfully With About Image');
        } else {

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,


            ]);
            return redirect()->back()->with('info', 'Update Was Successfully Without About Image');
        }
    }

    public function HomeAbout()
    {
        $aboutPage = About::find(1);
        return view('frontend.pages.about_page',compact('aboutPage'));
    }
    public function AboutMultiImage()
    {
       return view('admin.about_page.multi_image');
    }
    public function StoreMultiImage(Request $request)
    {
        $image = $request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_generation = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(220, 220)->save('uploads/multi_image/'
             . $name_generation);

            $save_url = 'uploads/multi_image/' . $name_generation;

           MultiImage::insert([
            'multi_image' =>$save_url,
            'created_at'=>Carbon::now()
           ]);
        }
            return redirect()->route('all.multi.image')->with('info', 'Multiple Image Inserted Successfully ');

    }
    public function AllMultiImage()
    {
       $allMultiImage = MultiImage::all();
       return view('admin.about_page.all_multi_image',compact('allMultiImage'));

    }
    public function  EditMultiImage($id)
    {
        $multiImage = MultiImage::FindOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));
    }
    public function UpdateMultiImage(Request $request)
    {
        $update_multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(220, 220)->save('uploads/multi_image/'
             . $name_generation);

            $save_url = 'uploads/multi_image/' . $name_generation;

            MultiImage::findOrFail($update_multi_image_id)->update([
                'multi_image' =>$save_url,

            ]);
            return redirect()->route('all.multi.image')->with('info', 'Update Was Successful');
        }
    }
public function DeleteMultiImage($id)
{
    // this method deletes the details from the database and the files in your public folder

    $multi = MultiImage::FindOrFail($id); //find the id on the db table
    $img = $multi->multi_image; // select the image  column on the table
    unlink($img); //unlink it from the public folder using the default unlink method

    //deleting the entire record of the item selected(using the id)
MultiImage::FindOrFail($id)->delete();

return redirect()->back()->with('info', 'Image was Successfully Deleted');
}
}
