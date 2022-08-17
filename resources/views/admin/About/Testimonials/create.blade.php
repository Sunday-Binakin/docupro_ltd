@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">TEAM
                        </h4>
                        <br>
                        <p class="card-title-desc">Add Testimony</p>
                        <br>
                        <form method="POST" action="{{ route('testimony.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="name" placeholder="Seth Tekper"
                                        id="example-text-input">
                                    <br>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="position"
                                        placeholder="General Manager" id="example-text-input">
                                    <br>
                                    @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Company Name</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="Uber" id="example-text-input">
                                    <br>
                                    @error('company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Testimony</label>
                                <div class="col-sm-12">
                                    {{-- <input class="form-control " type="text" name="about" 
                                        id="example-text-input"> --}}
                                    <textarea name="testimony" id="testimony"></textarea>
                                    <br>
                                    @error('testimony')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Add Image </label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="image" name="testimonial_picture" type="file">
                                    <br>
                                    @error('testimonial_picture')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-12">
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