@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Home Page</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div> --}}

                <div class="card">

                    <div class="card-body">
                        <br>
                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">UPDATE TEAM
                        </h4>
                        <br>
                        <p class="card-title-desc">Add a Team Member</p>
                        <br>
                        <form method="POST" action="{{ route('team.update',$edit_team_member->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="name"
                                        value="{{ $edit_team_member->name }}" id="example-text-input">
                                    <br>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio</label>
                                <div class="col-sm-10">
                                    <input class="form-control " type="text" name="portfolio"
                                        value="{{ $edit_team_member->portfolio }}" vid="example-text-input">
                                    <br>
                                    @error('portfolio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedln Profile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" name="linkedin"
                                        value="{{ $edit_team_member->linkedin }}" id="example-text-input">
                                    <br>
                                    @error('linkedln')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About</label>
                                <div class="col-sm-10">

                                    <textarea name="about" id="about">{{ $edit_team_member->about }}</textarea>
                                    <br>
                                    @error('about')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>




                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Add Image </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="image" name="member_image" type="file">
                                    <br>
                                    @error('member_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{ asset($edit_team_member->member_image)}}" alt="Card image cap">
                                </div>
                                <br>

                            </div>

                            <br>
                            <div>
                                <button style="width: 120px; " class="btn btn-primary btn-rounded"
                                    type="submit">Update</button>
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