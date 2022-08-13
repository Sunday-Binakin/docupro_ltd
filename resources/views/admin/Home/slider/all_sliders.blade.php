@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <br>
                            <div>
                                <a href="{{   route('add.slider') }}" style="width: 120px;float: right;" class="btn btn-primary btn-rounded" type="submit">Add Slider</a>
                            </div>
                            <br>
                            <br>
                        <hr>
                        <p style="font-size: 20px"> The Table below shows the list of availble sliders</p>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Description</th>
                                    <th>Telephone</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($all_sliders as $key => $slider )
                               

                                
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->summary }}</td>
                                    <td>
                                        <a href="{{ route('edit.slider', $slider->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a onclick="confirmation(event)"
                                            href="{{ route('delete.slider', $slider->id) }} "
                                            class="btn btn-danger sm" title="Delete Data" id="delete">Delete</a>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

@endsection