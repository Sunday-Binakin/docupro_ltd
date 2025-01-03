@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">Update Gallery
                        </h4>
                        <br>
                        <p class="card-title-desc">Update Gallery</p>
                        <br>
                        <form method="POST" action="{{ route('gallery.update', $edit_gallery->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image
                                    Description</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="image_description"
                                        value="{{ $edit_gallery->image_description }}" id="example-text-input">
                                    <br>
                                    @error('image_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Add Image</label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="image" name="gallery_image" type="file">
                                    <br>
                                    @error('gallery_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-12">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ asset($edit_gallery->gallery_image) }}" alt="Card image cap">
                                </div>
                                <br>

                            </div>

                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded"
                                    type="submit">Update</button>
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