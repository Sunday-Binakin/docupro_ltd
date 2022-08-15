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
                            <a href="{{ route('add.why.chose.us') }}" style="width: 160px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">Add Why Chose Us</a>
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
                                    <th>Title</th>
                                    <th>Short Summary</th>
                                    <th>Summary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $key => $chose )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{Str::limit($chose->title, 40) }}</td>
                                    <td>{!! Str::limit($chose->short_summary, 40) !!}</td>
                                    <td>{!! Str::limit($chose->summary,40) !!}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.why.chose.us', $chose->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('delete.why.chose.us', $chose->id) }} "
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