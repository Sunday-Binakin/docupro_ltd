@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title ; btn font-26 btn-primary waves-effect waves-light w-100">Why choose Us
                        </h4>
                        <br>
                        {{-- <p class="card-title-desc">Add Images to your home page</p> --}}
                        <br>

                        <form method="POST" action="{{ route('why.chose.us.update') }}" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $edit_chose_us->id }}">
                             <div class="row mb-3" >
                                <label for="example-text-input" class="col-sm-2 col-form-label">Why Chose Us</label>
                                <br>
                                <div class="col-sm-12" >
                                   <textarea name="why_chose_us" id="why_chose_us">{{ $edit_chose_us->why_chose_us }}</textarea>
                                    <br>
                                    @error('why_chose_us')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

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