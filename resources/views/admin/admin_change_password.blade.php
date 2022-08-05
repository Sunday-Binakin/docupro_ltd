@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password Page</h4><br>

                      {{-- displays error messages at the top of the field --}}
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @endif
                    {{-- end of error messages --}}
                        <form method="POST" action="{{ route('update.password') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="old_password" name="old_password" type="password">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="new_password" name="new_password" type="password">
                                </div>
                            </div> <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm New
                                    Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="confirm_new_password" name="confirm_new_password"
                                        type="password">


                                </div>

                            </div><br> <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                    </div> <!-- end row -->

                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>
</div>


@endsection
