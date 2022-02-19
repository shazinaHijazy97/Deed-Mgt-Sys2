@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Attendance Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>NIC</th>
                <th>Date In</th>
                <th>Time In</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($attendances as $attendance)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $attendance->nic }}</td>
                <td>{{ $attendance->date_in }}</td>
                <td>{{ $attendance->time_in }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

@endsection