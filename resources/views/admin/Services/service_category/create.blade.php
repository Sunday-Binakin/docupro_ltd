@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">NAME OF SERVICE
                        </h4>
                        <br>
                        <p class="card-title-desc">Add Service</p>
                        <br>
                        <br>
                        <form method="POST" action="{{ route('service.category.store') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Type</label>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="name" placeholder="" id="example-text-input">
                                    <br>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded" type="submit">Save</button>
                            </div>
                        </form>
                        <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of Services you offer</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Type of Service</th>
                                 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_all_service_categories as $key => $service_category )

                                <tr>
                                    <td>{{ $key+1}}</td>
                            <td>{{ $service_category->name}}</td>
                            
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" style="width: 120px" class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('service.category.edit', $service_category->id) }}">Edit</a>

                                        <a onclick="confirmation(event)" href="{{ route('service.category.destroy', $service_category->id) }} " class="dropdown-item" title="Delete Data" id="delete">Delete</a>


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
        </div>
    </div>
</div>

@endsection
