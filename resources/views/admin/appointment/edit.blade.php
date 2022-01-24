@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Apppointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Appointments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
<div class="container-fluid">
<div class="container modal-content">
<div class="modal-body">
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>There were some problems with your input.</strong>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action = "{{route('admin-appointment.update',$appointment->id)}}" method = "POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="client_id">Client NIC/Name</label>
    <!-- <input type="text" class="form-control" id="client_id" name="client_id" aria-describedby="" placeholder="Client ID"> -->
    <select name="client_id" id="client_id" class="form-control" >
      @foreach ($clients as $client)
        <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="lawyer_id">Lawyer NIC/Name</label>
    <!-- <input type="text" class="form-control" id="lawyer_id" name="lawyer_id" aria-describedby="" placeholder="Lawyer ID"> -->
    <select name="lawyer_id" id="lawyer_id" class="form-control" >
      @foreach ($lawyers as $lawyer)
        <option value="{{$lawyer->id}}">{{$client->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date" value="{{$appointment->date}}" placeholder="Date">
  </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" name="time" value="{{$appointment->time}}" placeholder="Time">
  </div>
  <div class="form-group">
    <label for="appointment_status">Appointment Status</label>
    <!-- <input type="text" class="form-control" id="appointment_status" name="appointment_status" placeholder="Appointment Status"> -->
    <select name="appointment_status" id="appointment_status" class="form-control">
      <option value="Active">Active</option>
      <option value="Pending">Pending</option>
      <option value="Cancelled">Cancelled</option>
    </select>
  </div>
  <div class="form-group">
    <label for="note">Note</label>
    <input type="text" class="form-control" id="note" name="note" value="{{$appointment->note}}" placeholder="Note">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>

  </div>
</section>

@endsection