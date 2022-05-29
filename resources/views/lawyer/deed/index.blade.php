@extends('lawyer.layout.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Deed Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Lawyer</li>
              <li class="breadcrumb-item active">Deed Requests</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="deed-table">
  <thead>  
  <tr>
      <th>ID</th>
      <th>Client ID</th>
      <th>Deed No</th>
      <th>Deed Type</th>
      <th>Request Date</th>
      <th>Payment Status</th>
    </tr>
  </thead>

    @foreach ($deedRequests as $deedRequest)

    <tr class="table-light">
      <td>{{$deedRequest->id}}</td>
      <td>{{$deedRequest->client->fname }} {{$deedRequest->client->lname }}</td>
      <td>{{$deedRequest->deed_no}}</td>
      <td>{{$deedRequest->deed_type}}</td>
      <td>{{$deedRequest->request_date}}</td>
      <td>{{$deedRequest->payment_status}}</td>

    </tr>

    @endforeach

  </table>

  </div>

</section>

@endsection