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

        @foreach($lawyers as $lawyer)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $lawyer->fname }} {{ $lawyer->lname }}</td>
                <td>{{ $lawyer->gender }}</td>
                <td>{{ $lawyer->nic }}</td>
                <td>{{ $lawyer->contact }}</td>
                <td>{{ $lawyer->address }}</td>
                <td>{{ $lawyer->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection