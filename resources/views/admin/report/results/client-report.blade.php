@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Client Report</h2>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Gender</th>
                <th>NIC</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($clients as $client)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $client->fname }} {{ $client->lname }}</td>
                <td>{{ $client->gender }}</td>
                <td>{{ $client->nic }}</td>
                <td>{{ $client->contact }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection