@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Case Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>

    <table class="table">
        <thead>
            <tr>
            <th>Client ID</th>
            <th>Title</th>
            <th>Case Type</th>
            <th>Lawyer ID</th>
            <th>Filed Date</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($clientCases as $case)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{$clientCases->client_id}}</td>
                <td>{{$clientCases->title}}</td>
                <td>{{$clientCases->case_type}}</td>
                <td>{{$clientCases->lawyer_id}}</td>
                <td>{{$clientCases->filed_date}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection