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
                            <a href="{{ route('testimony.create') }}" style="width: 180px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">+ Add Testimony</a>
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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                  
                                    <th>Testimony</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_testimonies as $key => $testimony )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $testimony->name}}</td>
                                    <td>{{ $testimony->position }}</td>
                                    <td>{{ $testimony->company_name }}</td>
                                    <td>{!!Str::limit($testimony->testimony, 80) !!}</td>
                                    <td>
                                        <img width="80px" height="50px" src="{{ asset($member->member_image) }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('testimony.edit', $testimony->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('testimony.destroy', $testimony->id) }} "
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