<?php

namespace App\Http\Controllers\ProductService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\ProductService\Product;
use App\Models\ProductService\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show_all_products = Product::with('Category')->get();
        // $show_all_products = Product::all();
        return view('admin.Product_service.products.index',compact('show_all_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //calling the products categories available and passing them to the product.create route

        $product_cat = ProductCategory::all();
        return view('admin.Product_service.products.create', compact('product_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //handling validations

        $request->validate([
            'product_name'=>'required|unique:products',
            'product_category_id'=>'required',
            'product_cover_image'=>'required',
            'product_description'=>'required',
          

        ],[
            'product_name.required'=>'Please add the name of the product',
            'product_category_id.required'=>'please select the category',
            'product_cover_image.required'=>'Please add a cover image',
            'product_description.required'=>'Please describe the product',
           
        ]);

        //handling how the image is stored
        if ($request->hasFile('product_cover_image')) {
            $file = $request->File('product_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product_cover_images/', $filename);
            Image::make(public_path('uploads/product_cover_images/' . $filename))->fit(400, 400)->save();
        } else {
            $filename = 'default.png';
        }
        Product::insert([
            'product_name' => $request->product_name,
            'product_category_id' => $request->product_category_id,
            'status' => $request->status,
            'product_description'=> $request->product_description,
            'product_cover_image' => 'uploads/product_cover_images/' . $filename,
            'created_at' => Carbon::now()
        ]);
        alert()->success('Successfully Added')->persistent(true, false);

        return redirect()->route('product.index');
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
        $edit_product = Product::FindOrFail($id);
        $all_category = ProductCategory::all();
        return view('admin.Product_service.products.edit', compact('edit_product', 'all_category'));
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
        if ($request->hasFile('product_cover_image')) {
            $file = $request->File('product_cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product_cover_images/', $filename);
            Image::make(public_path('uploads/product_cover_images/' . $filename))->fit(400, 400)->save();
          
            Product::FindOrFail($id)->update([
            'product_name' => $request->product_name,
            'product_category_id' => $request->product_category_id,
            'status' => $request->status,
            'product_description' => $request->product_description,
            'product_cover_image' => 'uploads/product_cover_images/' . $filename,
            'updated_at' => Carbon::now()

            ]);
            
            toast('Updated without Product Image', 'success', 'top-right')->hideCloseButton();
        
        } else {
            Product::FindOrFail($id)->update([
                'product_name' => $request->product_name,
                'product_category_id' => $request->product_category_id,
                'status' => $request->status,
                'product_description' => $request->product_description,
                'updated_at' => Carbon::now()
            ]);
        }
    
        toast('Updated without Product Image', 'success', 'top-right')->hideCloseButton();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::FindOrFail($id)->delete();
        toast('Deleted', 'success', 'top-right')->hideCloseButton();
        return redirect()->route('product.index');
    }
}
