@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit staff</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Staff Details</li>
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

  <form action = "{{route('admin-staff.update',$staff->id)}}" method = "POST">
    @csrf
    @method('PUT')
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" value="{{$staff->fname}}" aria-describedby="" placeholder="First Name">
      </div>
      <div class="col-md-6">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" value="{{$staff->lname}}" aria-describedby="" placeholder="Last Name">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="gender">Gender</label>
        <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
        <select name="gender" id="gender"  class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="nic">NIC</label>
        <input type="text" class="form-control" id="nic" name="nic" value="{{$staff->nic}}" placeholder="NIC">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" value="{{$staff->contact}}" placeholder="Contact">
      </div>
      <div class="col-md-6">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{$staff->address}}" placeholder="Address">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$staff->email}}" placeholder="Email">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>

  </div>
</section>

@endsection