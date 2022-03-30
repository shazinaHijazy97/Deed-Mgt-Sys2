@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Appointments Management Reports</h1>
    <form action = "{{url('post-appointment-report')}}" method = "POST">
        @csrf
        <div class="form-group">
          <div class="row">
          <div class="col-md-6">
            <label for="client_id">Client NIC/Name</label>
            <select name="client_id" id="client_id" class="form-control" >
              <option value="0">All Appointment</option>
                @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
            <label for="lawyer_id">Lawyer NIC/Name</label>
            <select name="lawyer_id" id="lawyer_id" class="form-control" >
              <option value="0">All Appointment</option>
                @foreach ($lawyers as $lawyer)
              <option value="{{$lawyer->id}}">{{$client->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
              @endforeach
            </select>
            </div>
          </div>
       </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label for="date_from">Date From</label>
            <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Date From">
          </div>
          <div class="col-md-6">
            <label for="date_from">Date To</label>
            <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Date To">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
            <label for="appointment_status">Appointment Status</label>
            <select name="appointment_status" id="appointment_status" class="form-control">
              <option value="Active">Active</option>
              <option value="Pending">Pending</option>
              <option value="Cancelled">Cancelled</option>
            </select>
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@endsection