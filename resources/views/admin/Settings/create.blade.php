@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">SETTINGS
                        </h4>
                        <br><br>
                        {{-- <p class="card-title-desc">SETTINGS</p>
                        <br> --}}
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Primary Contact</label>
                                        <input type="text" class="form-control" name="primary_contact"
                                            placeholder="Primary Contact">
                                        @error('primary_contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Secondary Contact </label>
                                        <input type="text" class="form-control" name="secondary_contact"
                                            placeholder="Secondary Contact">
                                        @error('secondary_contact')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Linkedin </label>
                                        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                                        @error('linkedin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook </label>
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                        @error('facebook')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Youtube </label>
                                        <input type="text" class="form-control" name="youtube"
                                            placeholder="Youtube">
                                        @error('youtube')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <br>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address
                                    </label>
                                    <div class="col-sm-12">

                                        <textarea name="address" id=""></textarea>
                                        <br>
                                        @error('address')

                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" id="image" name="logo" type="file">

                                        <br>
                                        @error('logo')


                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                    <br>
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