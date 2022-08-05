@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About Page</h4>
                        <form method="POST" action="{{ route('update.about') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $aboutPage->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="title" name="title" type="text"
                                        value="{{ $aboutPage->title }}">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="short_title" name="short_title"
                                        type="text" required="">{{ $aboutPage->short_title }}</textarea>
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="short_description" name="short_description"
                                        type="text">{{ $aboutPage->short_description }}</textarea>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="elm1" name="long_description"
                                        type="text">{{ $aboutPage->long_description }}</textarea>
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="about_image" type="file">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($aboutPage->about_image))?url('uploads/home_about/'.$aboutPage->about_image):url('uploads/no_image.jpg') }}" alt="">
                                </div>
                            </div> <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light"
                                value="Update About Page">
                        </form>

                        <div class="row mb-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Short Title</th>
                                        <th scope="col">Short Description</th>
                                        <th scope="col">Long Description</th>
                                        <th scope="col">About Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($aboutPage as $about) --}}
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $aboutPage->title }}</td>
                                        <td>{{ $aboutPage->short_title }}</td>
                                        <td>{{ $aboutPage->short_description }}</td>
                                        <td>{!! $aboutPage->long_description !!}</td>
                                        <td><img height="50px" width="70px" src="{{ asset($aboutPage->about_image) }}">
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}


                                </tbody>
                            </table>
                        </div>
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
