@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lawyer Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Lawyer Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="lawyer-table">
  <thead>  
  <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Gender</th>
      <th>NIC</th>
      <th>Practicing Area</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>

    @foreach ($lawyers as $lawyer)

    <tr class="table-light">
      <td>{{$lawyer->id}}</td>
      <td>{{$lawyer->fname}}</td>
      <td>{{$lawyer->lname}}</td>
      <td>{{$lawyer->gender}}</td>
      <td>{{$lawyer->nic}}</td>
      <td>{{$lawyer->practicing_area}}</td>
      <td>{{$lawyer->contact}}</td>
      <td>{{$lawyer->address}}</td>
      <td>{{$lawyer->email}}</td>
      <td><a href="{{route('admin-lawyers.edit',$lawyer->id)}}" class="btn btn-primary">Edit</a>
      <button type="submit" class="btn btn-danger remove-user" data-id="{{$lawyer->id}}" data-action="{{route('admin-lawyers.destroy',$lawyer->id)}}">Delete</button>
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
  <script>
      $(document).ready(function () {
    var table = $('#lawyer-table').DataTable({
      paging: false,
          info: false,
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var that = this;
 
                    $('input', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });
});
    </script>
</section>

@endsection