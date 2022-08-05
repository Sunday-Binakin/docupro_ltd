<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio_pages.portfolio_all', compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio_pages.add_portfolio');
    }

    public function StorePortfolio(Request $request)
    {
        //validation message
        $request->validate(
            [
                'portfolio_name' => 'required',
                'portfolio_title' => 'required',
                'portfolio_image' => 'required'
            ],
            [
                'portfolio_name.required' => 'Portfolio Name is Required',
                'portfolio_title.required' => 'Portfolio Title is Required',

            ]
        );
        $image = $request->file('portfolio_image');
        $name_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1020, 519)->save('uploads/portfolio_images/'
            . $name_generation);

        $save_url = 'uploads/portfolio_images/' . $name_generation;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('all.portfolio')->with('info', 'Upload Was Successful');
    }

    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::FindOrFail($id);
        return view('admin.portfolio_pages.edit_portfolio_page', compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request)
    {

        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020, 519)->save('uploads/portfolio_images/' . $name_gen);
            $save_url = 'uploads/portfolio_images/' . $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,

            ]);
            return redirect()->route('all.portfolio')->with('info', ' You Have succesfully Updated  your portfolio Data with Image');
        } else {

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,


            ]);
            return redirect()->route('all.portfolio')->with('info', ' You Have succesfully Updated  your portfolio Data without Image');
        } // end Else

    }

    public function DeletePortfolio($id)
    {
        // this method deletes the details from the database and the files in your public folder
        $portfolio = Portfolio::FindOrFail($id); //find the id on the db table
        $image_delete = $portfolio->portfolio_image; // select the image  column on the table
        unlink($image_delete); //unlink it from the public folder using the default unlink method
        Portfolio::FindOrFail($id)->delete(); //deleting the entire record of the item selected(using the id)


        return redirect()->back()->with('info', 'Delete was successful');
    }

    public function PortfolioDetails($id)
    {
        $portfolio = Portfolio::FindOrFail($id);
        return view('frontend.pages.portfolio_details', compact('portfolio'));
    }

public function HomePortfolio()
{
    $portfolio = Portfolio::latest()->get();
    return view('frontend.pages.portfolio_page',compact('portfolio'));
}
}
