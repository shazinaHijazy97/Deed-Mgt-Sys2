@extends('client.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Deed Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Client</li>
              <li class="breadcrumb-item active">Request Details</li>
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

  <form action = "{{url('client-deed-requests-post/{request}')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
      <input type="hidden" name = "client_id" value="{{Auth::guard('client')->id()}}">
      <div class="col-md-6">
        <label for="deed_no">Deed No</label>
        <input type="text" class="form-control" id="deed_no" name="deed_no" aria-describedby="" placeholder="Deed No">
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
        <input type="date" class="form-control" id="request_date" name="request_date" placeholder="Request Date">
      </div>
    </div>
  </div>
  <input type="hidden" name = "payment_status" value="Pending">
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
    $('#requet_date').attr('min',today);
</script>
</section>

<!-- <script>
    $('#client_id').select2();
</script> -->

@endsection