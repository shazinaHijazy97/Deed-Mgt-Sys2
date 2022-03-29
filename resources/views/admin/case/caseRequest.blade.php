@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Case Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Case Details</li>
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

  <form action = "{{route('admin-client-case.store')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="client_id">Client</label>
        <select name="client_id" id="client_id" class="form-control" >
          @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Title">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="case_type">Case Type</label>
        <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
        <select name="case_type" id="case_type" class="form-control">
          <option value="Property">Property</option>
          <option value="Criminal">Criminal</option>
          <option value="Divorce">Divorce</option>
          <option value="Civil">Civil</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="lawyer_id">Lawyer</label>
        <select name="lawyer_id" id="lawyer_id" class="form-control" >
          @foreach ($lawyers as $lawyer)
            <option value="{{$lawyer->id}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="filed_date">Filed Date</label>
        <input type="date" class="form-control" id="filed_date" name="filed_date" placeholder="Filed Date">
      </div>
      <div class="col-md-6">
        <label for="note">Note</label>
        <input type="text" class="form-control" id="note" name="note" placeholder="Note">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>

  </div>
</section>

@endsection