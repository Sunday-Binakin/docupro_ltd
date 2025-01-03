@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">Why choose Us
                        </h4>
                        <br>
                        {{-- <p class="card-title-desc">Add Images to your home page</p> --}}
                        <br>

                        <form method="POST" action="{{ route('store.why.chose.us') }}" >
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="title" placeholder="Title"
                                        id="example-text-input">
                                    <br>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3" >
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Short Summary</label>
                                <br>
                                <div class="col-sm-12" >
                                   <textarea name="short_summary" id="editor"></textarea>
                                    <br>
                                    @error('short_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3" >
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Summary</label>
                                <br>
                                <div class="col-sm-12" >
                                   <textarea name="summary" id="editor"></textarea>
                                    <br>
                                    @error('summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            {{-- <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Summary</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="summary" placeholder="Summary"
                                        id="example-text-input">
                                    <br>
                                    @error('summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="image_slider" type="file">
                                    @error('slider_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                {{-- <input class="form-control " type="text" name="image_slider" --}} {{--
                                    id="example-text-input"> --}}
                                {{-- <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                {{-- @error('image_slider') --}}
                                {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                                {{-- @enderror --}} 
                            {{-- </div> --}} 

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