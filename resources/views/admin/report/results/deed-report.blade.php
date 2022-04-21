@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Deed Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Index</th>
                <th>Client ID</th>
                <th>Deed No</th>
                <th>Deed Type</th>
                <th>Request Date</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($deedRequests as $deedRequest)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{$deedRequest->client_id}}</td>
                <td>{{$deedRequest->deed_no}}</td>
                <td>{{$deedRequest->deed_type}}</td>
                <td>{{$deedRequest->request_date}}</td>
                <td>{{$deedRequest->payment_status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection