@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">ALL GALLERY IMAGES
                        </h4>
                        <br>
                        <br>
                        <p class="card-title-desc">Show all Gallery Images</p>
                        <br>
                        <div>
                            <a href="{{ route('gallery.create') }}" style="width: 180px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">+Add Images</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of availble sliders</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Image Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_all_gallery_images as $key => $gallery )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $gallery->image_description}}</td>
                                
                                  
                                    <td>
                                        <img width="90px" height="70px" src="{{ asset($gallery->gallery_image) }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('gallery.edit', $gallery->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('gallery.destroy', $gallery->id) }} "
                                                    class="dropdown-item" title="Delete Data" id="delete">Delete</a>
                                            </div>
                                        </div>
                                    </td> -

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