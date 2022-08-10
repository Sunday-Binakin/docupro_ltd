@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Call Hot Line</h4>
                        <p class="card-title-desc">Add Office Line , together with the description</p>
                        <form method="POST" action="{{ route('add.call.experts') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="description" placeholder="Call Our Experts"
                                        id="example-text-input">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter description
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Telephone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="tel" name="telephone" placeholder="+233 (20)-000-0000"
                                        id="example-text-input">
                                </div>
                            </div>

                            <br>
                            <div>
                                <button class="btn btn-primary" type="submit">Save Info</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection