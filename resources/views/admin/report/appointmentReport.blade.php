@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Appointments Management Reports</h1>
    <form action = "{{url('post-appointment-report')}}" method = "POST">
        @csrf
        <div class="form-group">
        <label for="nic">Client/Lawyer NIC</label>
        <select name="nic" id="nic" class="form-control" >
            <option value="0">All Appointment</option>
        @foreach ($clients as $client)
            <option value="{{$client->nic}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
        @endforeach
        @foreach ($lawyers as $lawyer)
            <option value="{{$lawyer->nic}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
        @endforeach
        </select>
    </div>
        <!-- <div class="form-group">
    <label for="client_id">Client NIC/Name</label>
    <select name="client_id" id="client_id" class="form-control" >
      @foreach ($clients as $client)
        <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
      @endforeach
    </select>
  </div> -->
  <!-- <div class="form-group">
    <label for="lawyer_id">Lawyer NIC/Name</label>
    <select name="lawyer_id" id="lawyer_id" class="form-control" >
      @foreach ($lawyers as $lawyer)
        <option value="{{$lawyer->id}}">{{$client->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
      @endforeach
    </select>
  </div> -->
    <div class="form-group">
    <div class="row">
        <div class="col-md-4">
        <label for="date_from">Date From</label>
        <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Date From">
        </div>
    <!-- <div class="form-group"> -->
        <div class="col-md-4">
        <label for="date_from">Date To</label>
        <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Date To">
        </div>
    <!-- </div> -->
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@endsection