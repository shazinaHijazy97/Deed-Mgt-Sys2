@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Case Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>
    <input type="button" class="btn btn-success mt-2 mb-3" onclick="generate()" value="Export To PDF"/>


    <table class="table" id="table">
        <thead>
            <tr>
            <th>Index</th>
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
            <tr class="table-light">
                <td>{{ $index++ }}</td>
                <td>{{$case->clientFname }} {{$case->clientLname }}</td>
                <td>{{$case->title}}</td>
                <td>{{$case->case_type}}</td>
                <td>{{$case->lawyerFname}} {{$case->lawyerLname }}</td>
                <td>{{$case->filed_date}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4>Total = {{ $count }}</h4>
    
</div>

<script>
    function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "DEED LAW GROUP - CASE REPORT"); 
    doc.autoTable({ 
      html: '#table', 
      theme: 'plain'
      })
    doc.save('CaseReport.pdf')
}
</script>

@endsection