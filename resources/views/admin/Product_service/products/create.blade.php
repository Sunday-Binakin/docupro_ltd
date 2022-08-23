@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">PRODUCT
                        </h4>
                        <br>
                        <p class="card-title-desc">Add Product</p>
                        <br>
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Machinery">
                                        @error('product_name')


                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Category Id</label>
                                        <select class="form-select" required="" name="product_category_id">

                                             <option selected="" disabled="">Select category</option>

                                            @foreach ($product_cat as $category)
                                           
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach

                                            {{-- <option value="1">Technology</option>
                                            <option value="2">Agriculture</option> --}}

                                        </select>
                                        @error('product_category_id')


                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <br>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-12">

                                        <textarea name="product_description" id=""></textarea>
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
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                    <br>
                                </div>
                                <br>
                                <div>
                                    <button style="width: 120px; " class="btn btn-primary btn-rounded" type="submit">Save</button>
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

