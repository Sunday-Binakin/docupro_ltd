@extends('auth.master')
@section('body')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="text-align: center">Email Verification</h5><br>
            <p class="card-title-desc">Thanks for signing up! Before getting started, could you verify your email
                address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly
                send you another.
            </p><br>
            @if(session('status')=='verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                A new verification link has been sent to the email address you provided during registration.
            </div>
            @endif

            <div class="d-flex flex-wrap gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="float-left ">
                        <button class="btn btn-primary">Resend Verification Email</button>
                    </div>

                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="float-right ">
                        <a type="submit"
                            class="btn btn-primary underline text-sm text-gray-600 hover:text-gray-900">Log Out</a>
                    </div>
                </form>
            </div>

        </div>
        <!-- end card body  -->
    </div>
    <!-- end card -->
</div>
</div>
@endsection