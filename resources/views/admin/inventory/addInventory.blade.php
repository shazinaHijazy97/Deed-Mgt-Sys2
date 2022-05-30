@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Inventory Details</li>
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

  <form action = "{{url('admin-inventory')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="item_name">Item Name</label>
        <input type="text" class="form-control" id="item_name" name="item_name" aria-describedby="" placeholder="Item Name" required>
      </div>
      <div class="col-md-6">
        <label for="item_category">Category</label>
        <select name="item_category" id="item_category" class="form-control">
          <option value="Office Table">Office Table</option>
          <option value="Office Chair">Office Chair</option>
          <option value="Computers">Computers</option>
          <option value="Office Cupboards">Office Cupboards</option>
          <option value="Printers">Printers</option>
          <option value="Scanner">Scanner</option>
          <option value="Photocopy Machine">Photocopy Machine</option>
          <option value="Stationary Items">Stationary Items</option>
          <option value="Technical Items">Technical Items</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="quantity">Quantity</label>
        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
      </div>
      <div class="col-md-6">
        <label for="service_date">Service Date</label>
        <input type="date" class="form-control" id="service_date" name="service_date" placeholder="Service Date" required>
      </div>
    </div>
  </div>
  <div class="form-group">
  <div class = "row">
      <div class = "col-md-6">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer" required>
      </div>
      <div class="col-md-6">
        <label for="manufacturer_contact">Manufacturer Contact</label>
        <input type="text" class="form-control" id="manufacturer_contact" name="manufacturer_contact" placeholder="Manufacturer Contact" required>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

  </div>
</section>

<script>
    $('#client_id').select2();
</script>

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#service_date').attr('min',today);

    $('#item_category').select2({
      width: '100%',
    });
</script>

@endsection