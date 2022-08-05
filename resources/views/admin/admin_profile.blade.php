@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                        {{-- if there is no image upload into the db , it should put a thumbail image in the uploads
                        folder --}}
                        <img class="rounded-circle avatar-xl"
                        src="{{ (!empty($adminData->profile_picture))?
                            url('uploads/admin_profile_pictures/'.$adminData->profile_picture):
                            url('uploads/no_image.jpg') }}"
                            alt="Card image cap">
                    </center>

                    <div class="card-body">
                        <hr>
                        <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{ $adminData->username }}</h4>
                        <hr>
                        <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}"
                            class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
