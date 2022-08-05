@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Home Slider Page</h4>
                        <form method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $homeSlider->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="title" name="title" type="text"
                                        value="{{ $homeSlider->title }}">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title Summary</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="title_summary" name="title_summary" type="text"
                                        value="{{ $homeSlider->title_summary }}">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="video_url" name="video_url" type="text"
                                        value="{{ $homeSlider->video_url }}">
                                </div>

                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="home_slider" type="file">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{
                                        asset($homeSlider->home_slider) }}" alt="Card image cap">
                                </div>
                            </div> <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slider">
                        </form>
                        <div class="row mb-3">
                            <center>
                                <h4 class="card-title; mt-5" id="slider_table">Slider Summary</h4>
                            </center>
                            <div class="container mt-5">
                            <table class="table table-striped" id="slider_table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Title Summary</th>
                                        <th scope="col">Video Url</th>
                                        <th scope="col">Slider Image</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $homeSlider->title }}</td>
                                        <td>{{ $homeSlider->title_summary }}</td>
                                        <td>{{ $homeSlider->video_url }}</td>
                                        <td><img height="50px" width="70px" src="{{ asset($homeSlider->home_slider) }}">
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
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
{{-- <script>
       $(document).ready( function () {
    $('#slider_table').DataTable();
} );
</script> --}}
@endsection
