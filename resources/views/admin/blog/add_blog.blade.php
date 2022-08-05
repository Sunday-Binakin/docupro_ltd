@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Page</h4>
                        <form method="POST" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="blog_category_id">
                                        <option selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->blog_category }}</option>
                                        @endforeach
                                    </select>


                                  @if ($errors->has('blog_category_id'))
                                  <span class="text-danger">{{ $errors->first('blog_category_id') }}</span>
                              @endif
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control"  id="blog_title"
                                        name="blog_title" type="text">
                                        @error('blog_title')
                                        <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror

                                </div>
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control"
                                        name="blog_tag" value="home,sweet" type="text" data-role="tagsinput">
                                     </div>
                            </div> <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="elm1" name="blog_description" type="text"
                                        ></textarea>
                                </div>
                            </div> <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="blog_image" type="file">
                                </div>
                               r
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ url('uploads/no_image.jpg') }}" alt="">
                                </div>
                            </div> <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Blog Data">
                        </form>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e){
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        // reader.readAsDataURl(e.target.files['0']);
        reader.readAsDataURL(this.files[0]);
    });


});
</script>

@endsection
