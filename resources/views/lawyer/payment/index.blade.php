@extends('lawyer.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Lawyer</li>
              <li class="breadcrumb-item active">View Payments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">

  <table class="table" id="payment-table">
  <thead>  
  <tr>
      <th>Payment ID</th>
      <th>Client</th>
      <th>Lawyer</th>
      <th>Date</th>
      <th>Payment Type</th>
      <th>Amount</th>
    </tr>
  </thead>
    
    @foreach ($payments as $payment)

    <tr class="table-light">
      <td>{{$payment->id}}</td>
      <td>{{$payment->client->fname}} {{$payment->client->lname}}</td>
      <td>{{$payment->lawyer->fname}} {{$payment->lawyer->lname}}</td>
      <td>{{$payment->date}}</td>
      <td>{{$payment->payment_type}}</td>
      <td>{{$payment->amount}}</td>
    </tr>

    @endforeach
  
  </table>

  </div>

@endsection