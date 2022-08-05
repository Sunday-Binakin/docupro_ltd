@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Messages</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Messages</h4><br><br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                {{-- loop->iteration --}}
                                @foreach ($all_messages as $message)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{$message->email }}</td>
                                    <td>{{ $message->subject}}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</td>
                                    <td>{{ Str::limit($message->message,30) }}</td>
                                    <td>
                                        <a id="" class="btn btn-info sm" title="View Message" data-toggle="modal"
                                            data-target='#modal'>
                                            <i class="bi bi-eye"></i>

                                            {{-- <div class="modal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">View in Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Name : </p>
                                                            <p>Modal body text goes here.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}



                                        </a>





                                        <a onclick="confirmation(event)" href="{{ route('delete.message',$message->id) }}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        {{-- <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">View in Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Name : </p>
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


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

<script>
    $(document).ready(function(){
        // Open modal on page load
        $("#myModal").modal('show');

        // Close modal on button click
        $(".btn").click(function(){
            $("#myModal").modal('hide');
        });
    });
</script>

@endsection
