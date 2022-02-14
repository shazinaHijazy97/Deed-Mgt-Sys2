@extends('admin.layout.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Case Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Case Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="cases-table">
    <tr>
      <th>ID</th>
      <th>Client ID</th>
      <th>Title</th>
      <th>Case Type</th>
      <th>Lawyer ID</th>
      <th>Note</th>
      <th>Action</th>
    </tr>

    @foreach ($clientCases as $case)

    <tr>
      <td>{{$case->id}}</td>
      <td>{{$case->client_id}}</td>
      <td>{{$case->title}}</td>
      <td>{{$case->case_type}}</td>
      <td>{{$case->lawyer_id}}</td>
      <td>{{$case->note}}</td>
      <td><a href="{{route('admin-client-case.edit',$case->id)}}" class="btn btn-primary">Edit</a>
      <button type="submit" class="btn btn-danger remove-user" data-id="{{$case->id}}" data-action="{{route('admin-client-case.destroy',$case->id)}}">Delete</button>
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