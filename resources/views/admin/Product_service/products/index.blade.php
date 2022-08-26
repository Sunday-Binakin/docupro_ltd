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
                            <a href="{{ route('product.create') }}" style="width: 120px;float: right;" class="btn btn-primary btn-rounded" type="submit">Add Product</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below productss the list of availble sliders</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Description</th>

                                    <th> Cover Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_all_products as $key => $products )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $products->product_name}}</td>

                                    <td>{{ $products->category->category_name??'Id not found'}}</td>

                                    <td>{!! $products->product_description !!}</td>

                                    <td>
                                     <img width="80px" height="50px" src="{{ asset($products->product_cover_image) }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px" class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('product.edit', $products->id) }}">Edit</a>

                                                <a onclick="confirmation(event)" href="{{ route('product.destroy', $products->id) }} " class="dropdown-item" title="Delete Data" id="delete">Delete</a>

                                            </div>
                                        </div>
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

