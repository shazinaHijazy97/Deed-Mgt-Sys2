@extends('admin.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post Notification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item active">Post Notification</li>
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

  <form action = "{{route('admin-notification.store')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="notice_subject">Notice Subject</label>
        <input type="text" class="form-control" id="notice_subject" name="notice_subject" placeholder="Notice Subject" required>
      </div>
      <div class="col-md-6">
        <label for="notice_content">Notice Content</label>
        <input type="text" class="form-control" id="notice_content" name="notice_content" placeholder="Notice Content" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="notice_date">Date</label>
        <input type="date" class="form-control" id="notice_date" name="notice_date" placeholder="Notice Date" required>
      </div>
      <div class="col-md-6">
        <label for="notice_time">Notice Time</label>
        <input type="time" class="form-control" id="notice_time" name="notice_time" placeholder="Notice Time" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
        <div class = "col-md-6">
        <label for="notice_type">Notice Type</label>
        <select name="notice_type" id="notice_type" class="form-control">
          <option value="Public">Public</option>
          <option value="Announcement">Announcement</option>
          <option value="Special">Special</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="recepient">Recepient</label>
        <select name="recipient" id="recipient" class="form-control" >
          <option value="Public">Public</option>
          <option value="Clients">Clients</option>
          <option value="Lawyers">Lawyers</option>
          <option value="Clients + Lawyers">Clients + Lawyers</option>
        </select>
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
    $('#notice_date').attr('min',today);
</script>
</section>


@endsection