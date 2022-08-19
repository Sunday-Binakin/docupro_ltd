@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">GALLERY
                        </h4>
                        <br>
                        <br>
                        <p class="card-title-desc">Add More Images</p>
                        <br>
                        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image
                                    Description</label><br>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="image_description" placeholder="lorem ipsum"
                                        id="example-text-input">
                                    <br>
                                    @error('image_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Add Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="gallery_image" type="file">
                                    <br>
                                    @error('gallery_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                <br>

                            </div>

                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded"
                                    type="submit">Save</button>
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