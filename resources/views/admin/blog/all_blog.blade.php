@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Blog</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Blog</h4><br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Blog Category </th>
                                    <th>Bog Title</th>
                                    <th>Blog Tag</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                {{-- loop->iteration --}}
                                @foreach ($all_blog as $blogs)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    {{-- <td>{{ $blogs->Category->blog_category}}</td></td> --}}
                                    {{-- <td>{{ $blogs->Category->blog_category}}</td> --}}
                                    {{-- <td>{{ $blogs['category']['blog_category']}}</td> --}}
                                    <td>{{ $blog->Category->blog_category??'To be filled' }}</td>
                                    <td>{{ $blogs->blog_title }}</td>
                                    <td>{{ $blogs->blog_tag }}</td>
                                    <td>
                                        <img src="{{ asset($blogs->blog_image) }}" style="width: 50px; height:70px">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.blog',$blogs->id) }}" class="btn btn-info sm" title="Edit Data"><i
                                                class="fas fa-edit"></i></a>
                                        <a onclick="confirmation(event)" href="{{ route('delete.blog',$blogs->id) }}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure you?",
          text: "You will not be able to revert this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
            window.location.href = urlToRedirect;
}

});
}
</script>

@endsection
