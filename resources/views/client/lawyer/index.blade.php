@extends('client.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lawyer Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Client</li>
              <li class="breadcrumb-item active">Lawyer Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="lawyer-table">
  <thead>  
  <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Practicing Area</th>
    </tr>
  </thead>

    @foreach ($lawyers as $lawyer)

    <tr class="table-light">
      <td>{{$lawyer->id}}</td>
      <td>{{$lawyer->fname}}</td>
      <td>{{$lawyer->lname}}</td>
      <td>{{$lawyer->practicing_area}}</td>
    </tr>

    @endforeach

  </table>

  </div>

</section>

@endsection