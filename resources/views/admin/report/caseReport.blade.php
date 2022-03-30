@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Case Management Reports</h1>
    <form action = "{{url('post-case-report')}}" method = "POST">
        @csrf
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
           <label for="client_id">Client NIC/Name</label>
           <select name="client_id" id="client_id" class="form-control" >
             <option value="0">All Case Requests</option>
               @foreach ($clients as $client)
              <option value="{{$client->id}}">{{$client->nic}} - {{$client->fname}} {{$client->lname}}</option>
               @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label for="lawyer_id">Lawyer NIC/Name</label>
            <select name="lawyer_id" id="lawyer_id" class="form-control" >
            <option value="0">All Deed Requests</option>
                @foreach ($lawyers as $lawyer)
                <option value="{{$lawyer->id}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
                @endforeach
            </select>
        </div>
        </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="case_type">Case Type</label>
                    <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
                    <select name="case_type" id="case_type" class="form-control">
                    <option value="Property">Property</option>
                    <option value="Criminal">Criminal</option>
                    <option value="Divorce">Divorce</option>
                    <option value="Civil">Civil</option>
                    </select>
                </div>
        <div class="col-md-6">
    <label for="filed_date">Filed Date</label>
    <input type="date" class="form-control" id="filed_date" name="filed_date" placeholder="Filed Date">
  </div>
  </div>
  </div>
    <div class="form-group">
    <div class="row">
        <div class="col-md-6">
        <label for="date_from">Date From</label>
        <input type="date" class="form-control" id="date_from" name="date_from" placeholder="Date From">
        </div>
    <!-- <div class="form-group"> -->
        <div class="col-md-6">
        <label for="date_from">Date To</label>
        <input type="date" class="form-control" id="date_to" name="date_to" placeholder="Date To">
        </div>
    <!-- </div> -->
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@endsection