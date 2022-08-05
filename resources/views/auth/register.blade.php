@extends('auth.master')
@section('body')
     <h4 class="text-muted text-center font-size-18"><b>@section('title','Register')</b></h4>

    <div class="p-3">

        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="username" type="text" name="username" required=""
                        placeholder="Username">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="email" type="email" name="email" required=""
                        placeholder="Email">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="password" type="password" name="password" required=""
                        placeholder="Password">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-12">
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                        required="" placeholder="Confirm Password">
                </div>
            </div>

            {{-- <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a
                                                href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div> --}}

            <div class="form-group text-center row mt-3 pt-1">
                <div class="col-12">
                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                </div>
            </div>

            <div class="form-group mt-2 mb-0 row">
                <div class="col-12 mt-3 text-center">
                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                </div>
            </div>
        </form>
        <!-- end form -->
    </div>
@endsection
