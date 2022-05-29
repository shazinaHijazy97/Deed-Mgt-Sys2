@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Deed Requests</li>
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

  <form action = "{{route('admin-deed-requests.update',$deedRequests->id)}}" method = "POST">
    @csrf
    @method('PUT')
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="client_id">Client ID</label>
        <select name="client_id" id="client_id" class="form-control" >
            <option value="{{$client->id}}" selected>{{$client->id}}</option>
          @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->nic}} - {{$client->Fname}} {{$client->Lname}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label for="deed_no">Deed No</label>
        <input type="text" class="form-control" id="deed_no" name="deed_no" value="{{$deedRequests->deed_no}}" aria-describedby="" placeholder="Deed No">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
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
      <div class="col-md-6">
        <label for="request_date">Request Date</label>
        <input type="date" class="form-control" id="request_date" name="request_date" value= "{{$deedRequests->request_date}}" placeholder="Request Date">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="payment_status">Payment Status</label>
        <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
        <select name="payment_status" id="payment_status" class="form-control">
          <option value="Completed">Completed</option>
          <option value="Pending">Pending</option>
          <option value="Cancel">Cancel</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="note">Note</label>
        <input type="text" class="form-control" id="note" name="note" value= "{{$deedRequests->note}}" placeholder="Note">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
</div>

  </div>
</section>

@endsection