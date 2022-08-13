@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div>
                            <a href="{{ route('add.service') }}" style="width: 120px;float: right;" class="btn btn-primary btn-rounded" type="submit">Add
                                Service</a>
                        </div>
                        <br>
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
                                @foreach ($all_services as $key => $service )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $service->service_title }}</td>
                                    <td>{{ $service->service_summary }}</td>
                                    <td>
                                        <img src="{{ asset($service->service_image) }}" width="70px" width="90px">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            {{-- <i class="ri-settings-2-line"></i> --}}
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary  dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.service', $service->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('delete.service', $service->id) }} "
                                                    class="dropdown-item" title="Delete Data" id="delete">Delete</a>
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