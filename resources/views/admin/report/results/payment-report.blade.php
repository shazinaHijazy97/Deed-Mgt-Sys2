@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Payment Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Client</th>
                <th>Lawyer</th>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($payments as $payment)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{$payments->client->nic}} - {{$payments->client->fname}} {{$payments->client->lname}}</td>
                <td>{{$payments->lawyer->nic}} - {{$payments->lawyer->fname}} {{$payments->lawyer->lname}}</td>
                <td>{{ $payments->date }}</td>
                <td>{{ $payments->payment_type }}</td>
                <td>{{ $payments->amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection