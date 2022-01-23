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
    
    @foreach ($appointments as $appointment)

    <tr>
      <td>{{$appointment->id}}</td>
      <td>{{$appointment->client->nic}} - {{$appointment->client->fname}} {{$appointment->client->lname}}</td>
      <td>{{$appointment->lawyer->nic}} - {{$appointment->lawyer->fname}} {{$appointment->lawyer->lname}}</td>
      <td>{{$appointment->date}}</td>
      <td>{{$appointment->time}}</td>
      <td>{{$appointment->appointment_status}}</td>
      <td>{{$appointment->note}}</td>
      <td>EDIT | DELETE</td>
    </tr>

    @endforeach
  
  </table>

  </div>
</section>

@endsection