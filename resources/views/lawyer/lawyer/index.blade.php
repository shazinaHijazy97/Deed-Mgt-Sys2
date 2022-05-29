@extends('lawyer.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Your Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Lawyer</li>
              <li class="breadcrumb-item active">Client Details</li>
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
      <th>Lawyer ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>NIC</th>
      <th>Practicing Area</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Email</th>
    </tr>
  </thead>


    <tr class="table-light">
      <td>{{$lawyer->id}}</td>
      <td>{{$lawyer->fname}}</td>
      <td>{{$lawyer->lname}}</td>
      <td>{{$lawyer->nic}}</td>
      <td>{{$lawyer->practicing_area}}</td>
      <td>{{$lawyer->contact}}</td>
      <td>{{$lawyer->address}}</td>
      <td>{{$lawyer->email}}</td>
    </tr>


  </table>

  </div>

</section>

@endsection