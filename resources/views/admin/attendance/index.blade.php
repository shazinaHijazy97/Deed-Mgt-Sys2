@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">View Attendance</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="attendance-table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>NIC</th>
      <th>Type</th>
      <th>Date In</th>
      <th>Time In</th>
    </tr>

    @foreach ($attendances as $attendance)

    <tr class="table-light">
      <td>{{$attendance->id}}</td>
      <td>{{$attendance->lawyer->fname ?? $attendance->staff->fname}} {{$attendance->lawyer->lname ?? $attendance->staff->lname}}</td>
      <td>{{$attendance->nic}}</td>
      <td>
        @if ($attendance->lawyer->fname ?? '')
          <?php echo 'Lawyer'?>
        @endif
        @if ($attendance->staff->fname ?? '')
          <?php echo 'Staff'?>
        @endif
      </td>
      <td>{{$attendance->date_in}}</td>
      <td>{{$attendance->time_in}}</td>
    </tr>

    @endforeach

  </table>

  </div>

  <script type="text/javascript">

    // $(document).ready(function() {
    //   $('#attendance-table').DataTable();
    // });

    // $(document).ready(function () {
    //     var table = $('#attendance-table"').DataTable({
    //       paging: false,
    //       info: false,
    //       initComplete: function () {
    //           this.api()
    //               .columns()
    //               .every(function () {
    //                   var that = this;
  
    //                   $('input', function () {
    //                       if (that.search() !== this.value) {
    //                           that.search(this.value).draw();
    //                       }
    //                   });
    //               });
    //         },
    //     });
    // });

    </script>
    
</section>
@endsection