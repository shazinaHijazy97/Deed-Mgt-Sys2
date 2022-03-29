@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Deed Management Reports</h1>
    <form action = "{{url('post-deed-report')}}" method = "POST">
        @csrf
        <div class="row">
        <div class="col-md-4">
           <label for="client_id">Client NIC/Name</label>
           <select name="client_id" id="client_id" class="form-control" >
             <option value="0">All Deed Requests</option>
               @foreach ($clients as $client)
              <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
               @endforeach
            </select>
          </div>
          <div class="col-md-4">
           <label for="lawyer_id">Lawyer NIC/Name</label>
           <select name="lawyer_id" id="lawyer_id" class="form-control" >
            <option value="0">All Deed Requests</option>
              @foreach ($lawyers as $lawyer)
            <option value="{{$lawyer->id}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
             @endforeach
           </select>
          </div>
       </div>
       <div class="row">
         <div class="col-md-4">
    <label for="deed_type">Deed Type</label>
    <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
    <select name="deed_type" id="deed_type" class="form-control">
      <option value="Property">Property</option>
      <option value="House">House</option>
      <option value="Land">Land</option>
      <option value="Transfer">Transfer</option>
      <option value="Gift">Gift</option>
      <option value="Partnership">Partnership</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="request_date">Request Date</label>
    <input type="date" class="form-control" id="request_date" name="request_date" placeholder="Request Date">
  </div>
</div>
  <div class="col-md-4">
    <label for="payment_status">Payment Status</label>
    <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
    <select name="payment_status" id="payment_status" class="form-control">
      <option value="Completed">Completed</option>
      <option value="Pending">Pending</option>
      <option value="Cancel">Cancel</option>
    </select>
  </div>
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