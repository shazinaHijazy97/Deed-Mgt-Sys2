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
                <td>{{ $payment->clientFname }} {{ $payment->clientLname }}</td>
                <td>{{ $payment->lawyerFname }} {{ $payment->lawyerLname }}</td>
                <td>{{ $payment->date }}</td>
                <td>{{ $payment->payment_type }}</td>
                <td>{{ $payment->amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $total }}</h4>
    
</div>

@endsection