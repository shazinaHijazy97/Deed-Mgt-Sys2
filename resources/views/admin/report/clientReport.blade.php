@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Client Management Reports</h1>
    <form action = "{{url('post-client-report')}}" method = "POST">
        @csrf
    <div class="form-group">
        <div class = "row">
            <div class = "col-md-6">
                <label for="nic">Client Name/NIC</label>
                <select name="nic" id="nic" class="form-control" >
                    <option value="0">All Clients</option>
                @foreach ($clients as $client)
                    <option value="{{$client->nic}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
                @endforeach
                </select>
            </div>
        </div>
</div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>
<script>
    $('#nic').select2({
      width: '100%',
    });
</script>
@endsection