@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Call Hot Line</h4>
                        <p class="card-title-desc" style="font-size: 20px">Add Office Line , together with the
                            description</p>

                        <form method="POST" action="{{ route('add.call.experts') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="description"
                                        placeholder="Call Our Experts" id="example-text-input">
                                    <br>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Telephone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="tel" name="telephone"
                                        placeholder="+233 (20)-000-0000" id="example-text-input">
                                    <br>
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div>
                                <button class="btn btn-primary" type="submit">Save Contact</button>
                            </div>
                        </form>
                        <br>
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
                               
                                @foreach ($contacts as  $contact )
                                <tr>
                                    <td>{{  $loop->iteration }}</td>
                                    <td>{{ $contact->description }}</td>
                                    <td>{{ $contact->telephone }}</td>
                                    <td>
                                        <a href="{{ route('edit.call.experts', $contact->id) }}" class="btn btn-primary">Edit</a>
                                        <a onclick="confirmation(event)"
                                            href="{{ route('delete.call.experts', $contact->id) }} "
                                            class="btn btn-danger sm" title="Delete Data" id="delete">Delete</a>
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