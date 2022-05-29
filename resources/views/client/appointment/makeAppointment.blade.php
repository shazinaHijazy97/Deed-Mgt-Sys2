@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Make Appointments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Make Appointments</li>
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

  <form action = "{{route('admin-appointment.store')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="client_id">Client NIC/Name</label>
        <!-- <input type="text" class="form-control" id="client_id" name="client_id" aria-describedby="" placeholder="Client ID"> -->
        <select name="client_id" id="client_id" class="form-control" >
          @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label for="lawyer_id">Lawyer NIC/Name</label>
        <!-- <input type="text" class="form-control" id="lawyer_id" name="lawyer_id" aria-describedby="" placeholder="Lawyer ID"> -->
        <select name="lawyer_id" id="lawyer_id" class="form-control" >
          @foreach ($lawyers as $lawyer)
            <option value="{{$lawyer->id}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}} - {{$lawyer->practicing_area}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" placeholder="Date" required>
      </div>
      <div class="col-md-6">
        <label for="time">Time</label>
        <!-- <input type="time" class="form-control" id="time" name="time" placeholder="Time"> -->
        <select name="time" id="time" class="form-control">
          <option value="08:00:00">08:00:00</option>
          <option value="08:30:00">08:30:00</option>
          <option value="09:00:00">09:00:00</option>
          <option value="09:30:00">09:30:00</option>
          <option value="10:00:00">10:00:00</option>
          <option value="10:30:00">10:30:00</option>
          <option value="11:00:00">11:00:00</option>
          <option value="11:30:00">11:30:00</option>
          <option value="12:00:00">12:00:00</option>
          <option value="13:00:00">13:00:00</option>
          <option value="13:30:00">13:30:00</option>
          <option value="14:00:00">14:00:00</option>
          <option value="14:30:00">14:30:00</option>
          <option value="15:00:00">15:00:00</option>
          <option value="15:30:00">15:30:00</option>
          <option value="16:00:00">16:00:00</option>
          <option value="16:30:00">16:30:00</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="appointment_status">Appointment Status</label>
        <!-- <input type="text" class="form-control" id="appointment_status" name="appointment_status" placeholder="Appointment Status"> -->
        <select name="appointment_status" id="appointment_status" class="form-control">
          <option value="Active">Active</option>
          <option value="Pending">Pending</option>
          <option value="Cancelled">Cancelled</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="note">Note</label>
        <input type="text" class="form-control" id="note" name="note" placeholder="Note">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

  </div>

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date').attr('min',today);

    $('#client_id').select2({
      width: '100%',
    });
    $('#lawyer_id').select2({
      width: '100%',
    });
</script>
</section>

@endsection