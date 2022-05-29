@extends('lawyer.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Notifications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Lawyer</li>
              <li class="breadcrumb-item active">View Notifications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="notification-table">
  <thead>  
  <tr>
      <th>ID</th>
      <th>Notice Subject</th>
      <th>Notice Content</th>
      <th>Notice Date</th>
      <th>Notice Time</th>
      <th>Notice Type</th>
    </tr>
  </thead>
    
    @foreach ($notifications as $notification)

    <tr class="table-light">
      <td>{{$notification->id}}</td>
      <td>{{$notification->notice_subject}}</td>
      <td>{{$notification->notice_content}}</td>
      <td>{{$notification->notice_date}}</td>
      <td>{{$notification->notice_time}}</td>
      <td>{{$notification->notice_type}}</td>
    </tr>

    @endforeach
  
  </table>

  </div>

</section>

@endsection