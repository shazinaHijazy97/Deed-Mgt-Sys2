@extends('admin.layout.master')
@section('content')

<div class="container">
    <h2>Lawyer Report</h2>
    <input type="button" class="btn btn-success mt-2 mb-3" onclick="generate()" value="Export To PDF"/>

    
    <table class="table" id="table">
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
            <tr class="table-light">
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
<script>
    function generate() {  
    var doc = new jsPDF()
    doc.text(15, 10, "DEED LAW GROUP - LAWYERS REPORT"); 
    doc.autoTable({ 
      html: '#table', 
      theme: 'plain'
      })
    doc.save('LawyerReport.pdf')
}
</script>

@endsection