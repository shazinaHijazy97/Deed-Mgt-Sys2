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
              <li class="breadcrumb-item active">Inventory Deatails</li>
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
    <label for="item_name">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" aria-describedby="" placeholder="Item Name">
  </div>
  <div class="form-group">
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
  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
  </div>
  <div class="form-group">
    <label for="service_date">Service Date</label>
    <input type="date" class="form-control" id="service_date" name="service_date" placeholder="Service Date">
  </div>
  <div class="form-group">
    <label for="manufacturer">Manufacturer</label>
    <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer">
  </div>
  <div class="form-group">
    <label for="manufacturer_contact">Manufacturer Contact</label>
    <input type="text" class="form-control" id="manufacturer_contact" name="manufacturer_contact" placeholder="Manufacturer Contact">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>

  </div>
</section>

<script>
    $('#client_id').select2();
</script>

@endsection