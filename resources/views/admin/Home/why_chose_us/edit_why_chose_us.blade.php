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

                        <br>

                        <form method="POST" action="{{ route('update.why.chose.us') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $edit_chose_us->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="title" placeholder="Title"
                                        value="{{ $edit_chose_us->title }}" id="example-text-input">
                                    <br>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Short Summary</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="short_summary" id="editor"
                                        >{{ $edit_chose_us->short_summary }}</textarea>
                                    <br>
                                    @error('short_summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> Summary</label>
                                <br>
                                <div class="col-sm-12">
                                    <textarea name="summary" id="editor"
                                        >{{  $edit_chose_us->summary }}</textarea>
                                    <br>
                                    @error('summary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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