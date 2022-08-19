@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">ALL 
                         BLOGS
                        </h4>
                        <br>
                        <br>
                        <p class="card-title-desc">Show all Blogs</p>
                        <br>
                        <div>
                            <a href="{{ route('blog.create') }}" style="width: 180px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">+ Add Blog</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of availble Blogs</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Title</th>
                                    <th>Story By</th>
                                    <th>Story Summary</th>
                                    <th>Story Body</th>
                                    <th>Cover Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_all_blogs as $key => $blog )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $blog->title}}</td>
                                    <td>{{ $blog->story_by}}</td>
                                    <td>{!! Str::limit($blog->story_summary, 30) !!}</td>
                                    <td>{!! Str::limit($blog->story_body,30) !!}</td>


                                    <td>
                                        <img width="90px" height="70px" src="{{ asset($blog->cover_image) }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('blog.edit', $blog->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('blog.destroy', $blog->id) }} "
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