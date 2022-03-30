@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Attendance Management Reports</h1>
    <form action = "{{url('post-attendance-report')}}" method = "POST">
        @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="nic">Attendee NIC</label>
                <select name="nic" id="nic" class="form-control" >
                    <option value="0">All Attendance</option>
                @foreach ($lawyers as $lawyer)
                    <option value="{{$lawyer->nic}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
                @endforeach
                @foreach ($staffs as $staff)
                    <option value="{{$staff->nic}}">{{$staff->nic}} - {{$staff->fname}} {{$staff->lname}}</option>
                @endforeach
                </select>
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
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@endsection