@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mark Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Mark Attendance</li>
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
  <form action = "{{route('admin-attendance.store')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "col-md-6">
      <label for="nic">Lawyer/Staff NIC</label>
      <select name="nic" id="nic" class="form-control" >
        @foreach ($lawyers as $lawyer)
          <option value="{{$lawyer->nic}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
        @endforeach
        @foreach ($staffs as $staff)
          <option value="{{$staff->nic}}">{{$staff->nic}} - {{$staff->fname}} {{$staff->lname}}</option>
        @endforeach
      </select>
      <input type="hidden" id="date_in" name="date_in" value="<?php echo date('Y-m-d'); ?>">
      <input type="hidden" id="time_in" name="time_in" value="<?php echo date('h:i:s'); ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Mark Attendance</button>
</form>
</div>
</div>

  </div>
  <script>
    $('#nic').select2({
      width: '100%',
    });
</script>
</section>

<script>
    $('#nic').select2({
      width: '100%',
      placeholder: "Select Attendee"
    });

</script>

@endsection