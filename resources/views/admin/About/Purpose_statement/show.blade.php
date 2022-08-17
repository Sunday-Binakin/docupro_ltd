@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">PURPOSE
                            STATEMENT
                        </h4>
                        <br>
                        {{-- <p class="card-title-desc">Add Images to your home page</p> --}}
                        <br>

                        <form method="POST" action="{{ route('purpose.statement.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Mission</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="mission" id="mission">{{ $edit_purpose_statement->mission }}</textarea>
                                    <br>
                                    @error('mission')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Vision</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="vision" id="vision">{{ $edit_purpose_statement->vision }}</textarea>
                                    <br>
                                    @error('vision')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Values</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="values" id="values">{{ $edit_purpose_statement->values }}</textarea>
                                    <br>
                                    @error('values')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded"
                                    type="submit">Save</button>
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