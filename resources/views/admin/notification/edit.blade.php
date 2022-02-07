@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Notifications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Notifications</li>
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

  <form action = "{{route('admin-notifications.update',$notification->id)}}" method = "POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="notice_subject">Notice Subject</label>
    <input type="text" class="form-control" id="notice_subject" name="notice_subject" value="{{$notification->notice_subject}}" placeholder="Notice Subject">
  </div>
  <div class="form-group">
    <label for="notice_content">Notice Content</label>
    <input type="text" class="form-control" id="notice_content" name="notice_content" value="{{$notification->notice_content}}" placeholder="Notice Content">
  </div>
  <div class="form-group">
    <label for="notice_date">Date</label>
    <input type="date" class="form-control" id="notice_date" name="notice_date" value="{{$notification->notice_date}}" placeholder="Notice Date">
  </div>
  <div class="form-group">
    <label for="notice_time">Notice Time</label>
    <input type="time" class="form-control" id="notice_time" name="notice_time" value="{{$notification->notice_time}}" placeholder="Notice Time">
  </div>
  <div class="form-group">
    <label for="notice_type">Notice Type</label>
    <select name="notice_type" id="notice_type" class="form-control">
      <option value="Public">Public</option>
      <option value="Announcement">Announcement</option>
      <option value="Special">Special</option>
    </select>
  </div>
  <div class="form-group">
    <label for="recepient">Recepient</label>
    <select name="recipient" id="recipient" class="form-control" >
      <option value="Public">Public</option>
      <option value="Clients">Clients</option>
      <option value="Lawyers">Lawyers</option>
      <option value="Clients + Lawyers">Clients + Lawyers</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
</form>
</div>
</div>

  </div>
</section>

@endsection