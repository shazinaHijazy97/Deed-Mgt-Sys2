@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Appointment Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Client</th>
                <th>Lawyer</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{$appointment->client->nic}} - {{$appointment->client->fname}} {{$appointment->client->lname}}</td>
                <td>{{$appointment->lawyer->nic}} - {{$appointment->lawyer->fname}} {{$appointment->lawyer->lname}}</td>
                <!-- <td>{{ $appointment->client }}</td> -->
                <!-- <td>{{ $appointment->lawyer }}</td> -->
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection