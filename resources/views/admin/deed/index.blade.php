@extends('admin.layout.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Deed Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Deed Requests</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table">
    <tr>
      <th>ID</th>
      <th>Client ID</th>
      <th>Deed No</th>
      <th>Deed Type</th>
      <th>Request Date</th>
      <th>Payment Status</th>
      <th>Note</th>
      <th>Action</th>
    </tr>

    @foreach ($deedRequests as $deedRequest)

    <tr>
      <td>{{$deedRequest->id}}</td>
      <td>{{$deedRequest->client_id}}</td>
      <td>{{$deedRequest->deed_no}}</td>
      <td>{{$deedRequest->deed_type}}</td>
      <td>{{$deedRequest->request_date}}</td>
      <td>{{$deedRequest->payment_status}}</td>
      <td>{{$deedRequest->note}}</td>
      <td><a href="{{route('admin-deed-requests.edit',$deedRequest->id)}}" class="btn btn-primary">Edit</a>
      <button type="submit" class="btn btn-danger remove-user" data-id="{{$deedRequest->id}}" data-action="{{route('admin-deed-requests.destroy',$deedRequest->id)}}">Delete</button>
      </td>
    </tr>

    @endforeach

  </table>

  </div>
  <script type="text/javascript">
  $("body").on("click", ".remove-user", function(){
    var current_object = $(this);
    swal({
      title: "Are you sure?",
      type: "error",
      showCancelButton: true,
      dangerMode: true,
      cancelButtonClass: '#DD6B55',
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Delete',
    }, function (result) {
      if (result) {
        var action = current_object.attr('data-action');
        var token = jQuery('meta[name="csrf-token"]').attr('content');
        var id = current_object.attr('data-id');

        $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
        $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
        $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
        $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
        $('body').find('.remove-form').submit();
        

      }
    });
  });
  </script>
</section>

@endsection