@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Blog category</h4><br><br>
                        <form method="POST" action="{{ route('update.blog.category') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blog_category->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="blog_category" name="blog_category" type="text" value="{{ $blog_category->blog_category }}">
                                    @if ($errors->has('blog_category'))
                                    <span class="text-danger">{{ $errors->first('blog_category') }}</span>
                                    @endif
                                </div>
                            </div> <br><br><!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light"
                                value="Update Blog Category">
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
