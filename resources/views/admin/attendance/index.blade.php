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

  <table class="table">
    <tr>
      <th>ID</th>
      <th>NIC</th>
      <th>Name</th>
      <th>Date In</th>
      <th>Time In</th>
    </tr>

    @foreach ($attendances as $attendance)

    <tr>
      <td>{{$attendance->id}}</td>
      <td>{{$attendance->nic}}</td>
      <td>Name</td>
      <td>{{$attendance->date_in}}</td>
      <td>{{$attendance->time_in}}</td>
    </tr>

    @endforeach

  </table>

  </div>
</section>

@endsection