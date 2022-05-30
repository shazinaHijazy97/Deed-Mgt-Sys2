@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Make Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Make Payment</li>
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

  <form action = "{{route('admin-payment.store')}}" method = "POST">
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
            <option value="{{$lawyer->id}}">{{$client->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
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
        <label for="payment_type">Payment Type</label>
        <!-- <input type="text" class="form-control" id="appointment_status" name="appointment_status" placeholder="Appointment Status"> -->
        <select name="payment_type" id="payment_type" class="form-control">
          <option value="Active">Active</option>
          <option value="Pending">Pending</option>
          <option value="Cancelled">Cancelled</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="amount">Amount</label>
        <input type="amount" class="form-control" id="amount" name="amount" placeholder="Amount" required>
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

    $('#payment_type').select2({
      width: '100%',
    });
  </script>

</section>

@endsection