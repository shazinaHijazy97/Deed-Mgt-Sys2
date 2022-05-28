@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Deed Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>
    <input type="button" class="btn btn-success mt-2 mb-3" onclick="generate()" value="Export To PDF"/>


    <table class="table" id="table">
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
            <tr class="table-light">
                <td>{{ $index++ }}</td>
                <td>{{$deedRequest->clientFname }} {{$deedRequest->clientLname }}</td>
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

<script>
    function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "DEED LAW GROUP - DEED REPORT"); 
    doc.autoTable({ 
      html: '#table', 
      theme: 'plain'
      })
    doc.save('DeedReport.pdf')
}
</script>

@endsection