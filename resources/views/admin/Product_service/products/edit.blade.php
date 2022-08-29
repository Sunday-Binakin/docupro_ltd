@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">EDIT PRODUCT
                        </h4>
                        <br>
                        <p class="card-title-desc">Edit Product</p>
                        <br>
                        <form method="POST" action="{{ route('product.update',$edit_product->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $edit_product->product_name }}">
                                        @error('product_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" required="" 
                                        name="product_category_id">
                                            <option selected="" disabled="">Update Category</option>
                                            @foreach($all_category as $category)
                                            <option value="{{ $category->id }}" 
                                    {{$category->id == $edit_product->product_category_id  ? 'selected' : ''}}>
                                    {{ $category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Status </label>
                                        <select class="form-select" required="" name="status">

                                            <option selected="" disabled="">Update Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inctive</option>

                                        </select>
                                        @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <br>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-12">

                                        <textarea name="product_description" id="">{!! $edit_product->product_description !!}</textarea>

                                        <br>
                                        @error('product_description')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Cover Image</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id="image" name="product_cover_image" type="file">

                                        <br>
                                        @error('product_cover_image')


                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($edit_product->product_cover_image) }}" alt="Card image cap">

                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div>
                                    <button style="width: 120px; " class="btn btn-primary btn-rounded" type="submit">Update</button>
                                </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

