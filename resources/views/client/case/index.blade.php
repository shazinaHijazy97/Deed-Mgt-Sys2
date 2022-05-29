@extends('client.layout.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Case Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Client</li>
              <li class="breadcrumb-item active">Case Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="cases-table">
  <thead>  
  <tr>
      <th>Case ID</th>
      <th>Client Name</th>
      <th>Title</th>
      <th>Case Type</th>
      <th>Lawyer Name</th>
      <th>Filed Date</th>
    </tr>
  </thead>

    @foreach ($cases as $case)

    <tr class="table-light">
      <td>{{$case->id}}</td>
      <td>{{$case->client->fname}} {{$case->client->lname}}</td>
      <td>{{$case->title}}</td>
      <td>{{$case->case_type}}</td>
      <td>{{$case->lawyer->fname}} {{$case->lawyer->lname}}</td>
      <td>{{$case->filed_date}}</td>
    </tr>

    @endforeach

  </table>

  </div>

</section>

@endsection