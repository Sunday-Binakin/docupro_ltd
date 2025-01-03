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
                            <a href="{{ route('why.chose.us.create') }}"  style="width: 160px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">Add Why Chose Us</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Why Chose Us</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_chose_us as $key => $chose )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{!! Str::limit($chose->why_chose_us, 80) !!} </td>
                                   

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('why.chose.us.edit', $chose->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('why.chose.us.destroy', $chose->id) }} "
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