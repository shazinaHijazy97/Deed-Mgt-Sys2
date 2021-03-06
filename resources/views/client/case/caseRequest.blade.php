@extends('client.layout.master')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Case Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Client</li>
              <li class="breadcrumb-item active">Case Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content">
  <div class="container-fluid">
<div class="container modal-content">
<div class="modal-body">
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>There were some problems with your input.</strong>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action = "{{url('client-client-case/{request}')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class = "row">
    <input type="hidden" value="{{Auth::guard('client')->id()}}" name="client_id" >
      <div class="col-md-6">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="" placeholder="Title" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
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
        <label for="lawyer_id">Lawyer</label>
        <select name="lawyer_id" id="lawyer_id" class="form-control" >
          @foreach ($lawyers as $lawyer)
            <option value="{{$lawyer->id}}">{{$lawyer->fname}} {{$lawyer->lname}} - {{$lawyer->practicing_area}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="filed_date">Filed Date</label>
        <input type="date" class="form-control" id="filed_date" name="filed_date" placeholder="Filed Date" required>
      </div>
      <div class="col-md-6">
        <label for="note">Note</label>
        <input type="text" class="form-control" id="note" name="note" placeholder="Note" >
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

  </div>

  <script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#filed_date').attr('min',today);

    $('#case_type').select2({
      width: '100%',
    });

    $('#lawyer_id').select2({
      width: '100%',
    });

</script>
</section>

@endsection