@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <br>
                    <div class="card-body">
                        <br>
                        <div>
                            <a href="{{route('add.call.experts') }}" style="width: 120px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit">Add Contact</a>
                        </div>
                        <br><br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of availble contacts</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Description</th>
                                    <th>Telephone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($contacts as $key => $contact ) --}}
                                @php($i = 1)

                                @foreach ($contacts as $contact )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->description }}</td>
                                    <td>{{ $contact->telephone }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.call.experts', $contact->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('delete.call.experts', $contact->id) }} "
                                                    class="btn btn-danger dropdown-item" title="Delete Data"
                                                    id="delete">Delete</a>
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