@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">EDIT SERVICE NAME
                        </h4>
                        <br>
                        <p class="card-title-desc">Edit Service Name</p>
                        <br>
                        <form method="POST" action="{{ route('service.category.update', $edit_service_category->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Name</label>
                                <div class="col-sm-12">
                                    <input class="form-control " type="text" name="name" value="{{ $edit_service_category->name }}" id="example-text-input">
                                    <br>
                                </div>
                            </div>
                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded" type="submit">Update</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

