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
                            <a href="{{ route('add.our.experts') }}" style="width: 160px;float: right;"
                                {{-- ri-add-circle-fill --}}
                                class="btn btn-primary btn-rounded ri-add-circle-fill" type="submit">  Add Experts</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        {{-- <p style="font-size: 20px"> The Table below shows the list of availble sliders</p> --}}
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Name</th>
                                    <th>Portfolio</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_our_experts as $key => $experts )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $experts->name }}</td>
                                    <td>{{ $experts->portfolio }}</td>
                                    <td>
                                        <img width="70px" height="50px" src="{{ asset($experts->experts_image) }}">
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.our.experts', $experts->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('delete.our.experts', $experts->id) }} "
                                                    class="dropdown-item" title="Delete Data" id="delete">Delete</a>
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