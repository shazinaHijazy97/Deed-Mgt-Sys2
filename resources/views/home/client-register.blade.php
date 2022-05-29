<html>
    <head>
    <title>DEED LAW GROUP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

<body>

        <nav class="navbar navbar-expand-lg py-3 navbar-dark shadow-sm" style="background-color: #130f40;">
            <div class="container">

                <span class="text-uppercase font-weight-bold text-white">Deed Law Group</span>

                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item"><a href="/" class="nav-link"><i class="far fa-circle nav-icon"></i>Home</a></li>
                    <li class="nav-item"><a href="about-us" class="nav-link"><i class="far fa-circle nav-icon"></i>About Us <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="services" class="nav-link" ><i class="far fa-circle nav-icon"></i>Services</a></li>
                    <li class="nav-item"><a href="contact" class="nav-link"><i class="far fa-circle nav-icon"></i>Contact</a></li>
                </ul>
                </div>
            </div>
        </nav>

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

  <form action = "{{url('client-client-register/{request}')}}" method = "POST">
    @csrf
  <div class="form-group">
    <div class ="row">
      <div class = "col-md-6">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="" placeholder="First Name" required>
      </div>
      <div class="col-md-6">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" aria-describedby="" placeholder="Last Name" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="gender">Gender</label>
        <!-- <input type="text" class="form-control" id="gender" placeholder="Gender"> -->
        <select name="gender" id="gender" class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="nic">NIC</label>
        <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="contact">Contact</label>
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
      </div>
      <div class="col-md-6">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class = "row">
      <div class = "col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/" ><button class="btn btn-secondary">Back to Home</button></a>

</div>
</div>

  </div>
</section>

</body>

</html>