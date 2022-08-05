@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio View Page</h4><br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                {{-- loop->iteration --}}


                                @foreach ($portfolio as $port)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $port->portfolio_name }}</td>
                                    <td>{{ $port->portfolio_title }}</td>
                                    <td><img src="{{ asset($port->portfolio_image) }}"
                                            style="width: 60px; height:50px;"></td>
                                    <td>
                                        <a href="{{ route('edit.portfolio',$port->id) }}" class="btn btn-info sm"
                                            title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a onclick="confirmation(event)"
                                            href="{{ route('delete.portfolio',$port->id) }}" class="btn btn-danger sm"
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
