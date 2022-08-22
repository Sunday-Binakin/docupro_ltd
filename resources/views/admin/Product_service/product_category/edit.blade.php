@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">EDIT CATEGORY
                        </h4>
                        <br>
                        <p class="card-title-desc">Add Category</p>
                        <br>
                        <form method="POST" action="{{ route('product.category.update',$edit_category->id) }}" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ $edit_category->category_name }}">
                                        @error('category_name')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select"  name="status">
                                            {{-- <option selected="{{ ($edit_category->status =='active'? 'Active': 'Inactive') }}" disabled="">{{ $edit_category->status }}</option> --}}
                                            
                                            <option value="active" {{ $edit_category->status=='active'?'selected':'' }}>Active</option>
                                            <option value="inactive {{ $edit_category->status=='inactive'?'selected':'' }}">Inactive</option>

                                        </select>
                                        @error('status')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Cover Image</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id="image" name="product_category_cover_image" type="file">

                                        <br>
                                        @error('product_category_cover_image')


                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($edit_category->product_category_cover_image) }}" alt="Card image cap">
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
