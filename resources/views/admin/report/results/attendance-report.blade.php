@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Attendance Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>
    <input type="button" class="btn btn-success mt-2 mb-3" onclick="generate()" value="Export To PDF"/>


    <table class="table" id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIC</th>
                <th>Name</th>
                <th>Date In</th>
                <th>Time In</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1;
        @endphp

        @foreach($attendances as $attendance)
            <tr class="table-light">
                <td>{{ $index++ }}</td>
                <td>{{ $attendance->nic }}</td>
                <td>{{ $attendance->fname }} {{ $attendance->lname }}</td>
                <td>{{ $attendance->date_in }}</td>
                <td>{{ $attendance->time_in }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

<script>
    function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "DEED LAW GROUP - ATTENDANCE REPORT"); 
    doc.autoTable({ 
      html: '#table', 
      theme: 'plain'
      })
    doc.save('AttendanceReport.pdf')
}
</script>

@endsection