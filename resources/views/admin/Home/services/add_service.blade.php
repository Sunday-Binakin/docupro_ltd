@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title; btn font-26 btn-primary waves-effect waves-light w-100">Services</h4><br>
                        <p class="card-title-desc" style="font-size: 20px">
                            Add The Service you offer
                        </p>

                        <form method="POST" action="{{ route('store.service') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="service_title" placeholder="service"
                                        id="service_title">
                                    <br>
                                    @error('service_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Summary</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="service_summary" placeholder="Summary"
                                        id="service_summary">
                                    <br>
                                    @error('service_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Image </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="service_image" type="file">
                                    @error('service_image')
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
                                @error('image_slider')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>
                            <div>
                                <button class="btn btn-primary btn-rounded" style="width: 120px" type="submit">Save Service</button>
                            </div>
                        </form>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection