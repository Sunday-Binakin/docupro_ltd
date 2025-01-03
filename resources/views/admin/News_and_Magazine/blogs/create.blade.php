@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">BLOGS
                        </h4>
                        <br>
                        <p class="card-title-desc">Add Blog</p>
                        <br>
                        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="title" placeholder=""
                                        id="example-text-input">
                                    <br>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Story By</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="story_by"
                                        placeholder="General Manager" id="example-text-input">
                                    <br>
                                    @error('')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Story Summary</label>
                                <div class="col-sm-12">
                                    {{-- <input class="form-control " type="text" name="about" 
                                        id="example-text-input"> --}}
                                    <textarea name="story_summary" id="story_summary"></textarea>
                                    <br>
                                    @error('story_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Story Body</label>
                                <div class="col-sm-12">
                                    {{-- <input class="form-control " type="text" name="about" 
                                        id="example-text-input"> --}}
                                    <textarea name="story_body" id="story_body"></textarea>
                                    <br>
                                    @error('story_body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Cover Image</label>
                                <div class="col-sm-12">
                                    <input class="form-control" id="image" name="cover_image" type="file">
                                    <br>
                                    @error('cover_image')
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