@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Page</h4><br>
                        <Form method="POST" action="{{ route('update.footer') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $all_footer->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="number" type="text" id="example-text-input"
                                        value="{{ $all_footer->number }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short
                                    Description</label></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description" type="text"
                                        id="elm1">{{ $all_footer->short_description }}</textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" id="example-text-input"
                                        value="{{ $all_footer->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" id="example-text-input"
                                        value="{{ $all_footer->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="facebook" type="text" id="example-text-input"
                                        value="{{ $all_footer->facebook }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="twitter" type="text" id="example-text-input"
                                        value="{{ $all_footer->twitter }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copy Right</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="copyright" type="text" id="example-text-input"
                                        value="{{ $all_footer->copyright }}">
                                </div>
                            </div><br><br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Footer">
                        </Form>
                        

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection