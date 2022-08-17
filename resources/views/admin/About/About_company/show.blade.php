@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">ABOUT COMPANY
                        </h4>
                        <br>
                        {{-- <p class="card-title-desc">Add Images to your home page</p> --}}
                        <br>

                        <form method="POST" action="{{ route('about.company.store', $edit_about_company->id) }}">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Summary</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="about_summary" id="about_summary">{{ $edit_about_company->about_summary }}</textarea>
                                    <br>
                                    @error('about_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="about" id="about">{{ $edit_about_company->about }}</textarea>
                                    <br>
                                    @error('about')
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