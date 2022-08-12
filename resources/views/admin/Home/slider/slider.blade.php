@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Call Hot Line</h4>
                        <p class="card-title-desc" style="font-size: 20px">Add Office Line , together with the
                            description</p>

                        <form method="POST" action="{{ route('add.call.experts') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" placeholder="Title"
                                        id="example-text-input">
                                    <br>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Summary</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="summary"
                                        placeholder="Summary" id="example-text-input">
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
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                @error('image_slider')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <br>
                            <div>
                                <button class="btn btn-primary" type="submit">Save Slider Info</button>
                            </div>
                        </form>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of availble contacts</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Title</th>
                                    <th>Summary</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
@foreach ($all_sliders as $key => $slider )
<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $slider->title }}</td>
    <td>{{ $slider->summary }}</td>
    <td>{{ $slider->image }}</td>
    <td>
        <a href="" class="btn btn-primary">Edit</a>
        <a onclick="confirmation(event)" href=" " class="btn btn-danger sm"
            title="Delete Data" id="delete">Delete</a>
    </td>

</tr>  
@endforeach
                                


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection