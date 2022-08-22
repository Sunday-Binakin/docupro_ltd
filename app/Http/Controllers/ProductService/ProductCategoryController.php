<?php

namespace App\Http\Controllers\ProductService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\ProductService\ProductCategory;
use Carbon\Carbon;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = ProductCategory::latest()->get();
        return view('admin.Product_service.product_category.index', compact('all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Product_service.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $request->validate([
            'category_name' => 'required',
            'status' => 'required',
            'product_category_cover_image' => 'required'
        ], [
            'category_name.required' => 'Please Add category',
            'status.required' => 'What is the Status of the product',
            'product_category_cover_image.required' => 'Please add an image'
        ]);
        //handling how the image is stored
        if ($request->hasFile('product_category_cover_image')) {
            $file = $request->File('product_category_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product_category_cover_images/', $filename);
            Image::make(public_path('uploads/product_category_cover_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }
        ProductCategory::insert([
            'category_name' => $request->category_name,
            'status' => $request->status,
            'product_category_cover_image' => 'uploads/product_category_cover_images/' . $filename,
            'created_at' => Carbon::now()
        ]);

        alert()->success('Successfully Added')->persistent(true, false);
        return redirect()->route('product.category.index');
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
        $edit_category = ProductCategory::FindOrFail($id);
        return view('admin.Product_service.product_category.edit', compact('edit_category'));
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
        //handling how the image is stored
        if ($request->hasFile('product_category_cover_image')) {
            $file = $request->File('product_category_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product_category_cover_images/', $filename);
            Image::make(public_path('uploads/product_category_cover_images/' . $filename))->fit(400, 400)->save();

            ProductCategory::FindOrFail($id)->update([
                'category_name' => $request->category_name,
                'status' => $request->status,
                'product_category_cover_image' => 'uploads/product_category_cover_images/' . $filename,
                'updated_at' => Carbon::now()
            ]);
            toast('Form Updated with Image ', 'success', 'top-right')->hideCloseButton();
        } else {
            ProductCategory::FindOrFail($id)->update([
                'category_name' => $request->category_name,
                'status' => $request->status,
                // 'product_category_cover_image' => 'uploads/product_category_cover_images/' . $filename,
                'updated_at' => Carbon::now()
            ]);
            toast('Form Updated without Image ', 'success', 'top-right')->hideCloseButton();
        }


        // alert()->success('Successfully Added')->persistent(true, false);
        return redirect()->route('product.category.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::FindOrFail($id)->delete();
        toast('Delete', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('product.category.index');
    }
}
