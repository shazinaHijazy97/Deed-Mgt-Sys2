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
  <form action = "{{url('admin-lawyers')}}" method = "POST">
    @csrf
  <div class="form-group">
    <label for="client_id">Lawyer/Staff NIC</label>
    <select name="client_id" id="client_id" class="form-control" >
      @foreach ($lawyers as $lawyer)
        <option value="{{$lawyer->id}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Mark Attendance</button>
</form>
</div>
</div>

  </div>
</section>

<script>
    $('#client_id').select2();
</script>

@endsection