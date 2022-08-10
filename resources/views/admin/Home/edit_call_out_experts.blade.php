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

                        <form method="POST" action="{{ route('edit.call.experts') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $edit_call_experts->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="description"
                                        placeholder="Call Our Experts" value="{{ $edit_call_experts->description }}">
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
                                        placeholder="+233 (20)-000-0000" value="{{ $edit_call_experts->telephone }}">
                                    <br>
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div>
                                <button class="btn btn-primary" type="submit">Update Contact</button>
                            </div>
                        </form>
                        <br>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection