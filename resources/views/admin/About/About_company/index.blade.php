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
                            <a href="{{ route('about.company.create') }}" style="width: 180px;float: right;"
                                class="btn btn-primary btn-rounded" type="submit"> + Add About Company</a>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>About Summary</th>
                                    <th>About</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_about_company as $key => $company )
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{!! Str::limit($company->about_summary, 80) !!} </td>
                                    <td>{!! Str::limit($company->about, 80) !!} </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" style="width: 120px"
                                                class="btn btn-primary dropdown-toggle ri-settings-2-line ri-1.9x"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('about.company.edit', $company->id) }}">Edit</a>

                                                <a onclick="confirmation(event)"
                                                    href="{{ route('about.company.destroy', $company->id) }} "
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