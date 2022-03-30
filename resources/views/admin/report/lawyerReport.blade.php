@extends('admin.layout.master')
@section('content')

<div class="container">
    <h1>Lawyer Management Reports</h1>
    <form action = "{{url('post-lawyer-report')}}" method = "POST">
        @csrf
    <div class="form-group">
        <div class = "row">
            <div class = "col-md-6">
                <label for="nic">Lawyer Name/NIC</label>
                <select name="nic" id="nic" class="form-control" >
                    <option value="0">All Lawyers</option>
                @foreach ($lawyers as $lawyer)
                    <option value="{{$lawyer->nic}}">{{$lawyer->nic}} - {{$lawyer->fname}} {{$lawyer->lname}}</option>
                @endforeach
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>

@endsection