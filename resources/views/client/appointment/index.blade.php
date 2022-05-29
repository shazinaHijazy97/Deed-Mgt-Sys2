@extends('client.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Client</li>
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
        <th>Appointment ID</th>
        <th>Client</th>
        <th>Lawyer</th>
        <th>Date</th>
        <th>Time</th>
        <th>Appointment Status</th>
      </tr>
  </thead>
    
    @foreach ($appointments as $appointment)

    <tr class="table-light">
      <td>{{$appointment->id}}</td>
      <td>{{$appointment->client->fname}} {{$appointment->client->lname}}</td>
      <td>{{$appointment->lawyer->fname}} {{$appointment->lawyer->lname}} - {{$appointment->lawyer->practicing_area}}</td>
      <td>{{$appointment->date}}</td>
      <td>{{$appointment->time}}</td>
      <td>{{$appointment->appointment_status}}</td>
    </tr>

    @endforeach
  
  </table>

  </div>

</section>

@endsection