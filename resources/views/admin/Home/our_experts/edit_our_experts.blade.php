@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">Our Experts
                        </h4>
                        <br>
                        {{-- <p class="card-title-desc">Add Images to your home page</p> --}}
                        <br>

                        <form method="POST" action="{{ route('update.our.experts') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $edit_our_experts->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" placeholder="Adwoa Alodina"
                                        id="example-text-input" value="{{ $edit_our_experts->name }}">
                                    <br>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="portfolio"
                                        placeholder="General Manager" id="example-text-input"
                                        value="{{ $edit_our_experts->portfolio }}">
                                    <br>
                                    @error('portfolio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Experts Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="experts_image" type="file">
                                    <br>
                                    @error('experts_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <img id="showImage" class="rounded avatar-lg" src="{{ asset($edit_our_experts->experts_image) }}" alt="Card image cap">
                            </div>
                           
                    </div>

                    <br>
                    <div>
                        <button style="width: 120px; " class="btn btn-primary btn-rounded" type="submit">Save</button>
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