@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <br>
                        <div>
                            <a href="{{ route('settings.create') }}" style="width: 120px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">Add Settings</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below categoris the list of available </p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    
                                    <th>Primary</th>
                                    <th>Address</th>
                                   <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($all_categories as $key => $category )

                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $category->category_name}}</td>
                                    <td>{{ $category->status }}</td>
                                    {{-- <td>{{ $category->slider_image }}</td> --}}
                                    {{-- <td> -
                                        <img width="80px" height="50px"
                                            src="{{ asset($category->product_category_cover_image) }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('product.category.edit', $category->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('product.category.destroy', $category->id) }} "
                                                    class="dropdown-item" title="Delete Data" id="delete">Delete</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                @endforeach --}}

                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection