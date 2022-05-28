@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Payment Report</h2>
    <h4>{{$dateFrom}} - {{$dateTo}}</h4>
    <input type="button" class="btn btn-success mt-2 mb-3" onclick="generate()" value="Export To PDF"/>


    <table class="table" id= "table">
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
            <tr class="table-light">
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

<script>
    function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "DEED LAW GROUP - PAYMENTS REPORT"); 
    doc.autoTable({ 
      html: '#table', 
      theme: 'plain'
      })
    doc.save('PaymentReport.pdf')
}

</script>
@endsection