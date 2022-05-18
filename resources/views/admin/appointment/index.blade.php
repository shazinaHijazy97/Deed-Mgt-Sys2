@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">View Appointments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="appointment-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Lawyer</th>
        <th>Date</th>
        <th>Time</th>
        <th>Appointment Status</th>
        <th>Note</th>
        <th>Action</th>
      </tr>
  </thead>
    
    @foreach ($appointments as $appointment)

    <tr>
      <td>{{$appointment->id}}</td>
      <td>{{$appointment->client->nic}} - {{$appointment->client->fname}} {{$appointment->client->lname}}</td>
      <td>{{$appointment->lawyer->nic}} - {{$appointment->lawyer->fname}} {{$appointment->lawyer->lname}}</td>
      <td>{{$appointment->date}}</td>
      <td>{{$appointment->time}}</td>
      <td>{{$appointment->appointment_status}}</td>
      <td>{{$appointment->note}}</td>
      <td><a href="{{route('admin-appointment.edit',$appointment->id)}}" class="btn btn-primary">Edit</a>
      <button type="submit" class="btn btn-danger remove-user" data-id="{{$appointment->id}}" data-action="{{route('admin-appointment.destroy',$appointment->id)}}">Delete</button>
      <!-- <td>EDIT | DELETE</td> -->
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
    var table = $('#appointment-table').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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