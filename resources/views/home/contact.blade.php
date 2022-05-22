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
                <!-- Logo Image -->
                <img src="{{asset('assets/img/logo.png')}}" width="45" alt="" class="d-inline-block align-middle mr-2">
                <!-- Logo Text -->
                <span class="text-uppercase font-weight-bold text-white">Deed Law Group</span>

                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item"><a href="/" class="nav-link"><i class="far fa-circle nav-icon"></i>Home<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="about-us" class="nav-link"><i class="far fa-circle nav-icon"></i>About Us</a></li>
                    <li class="nav-item"><a href="services" class="nav-link"><i class="far fa-circle nav-icon"></i>Services</a></li>
                    <li class="nav-item active"><a href="contact" class="nav-link"><i class="far fa-circle nav-icon"></i>Contact <span class="sr-only">(current)</span></a></li>
                </ul>
                </div>
            </div>
        </nav>
        
    <div
        class="bg-image"
        style="
            background-image: url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bGF3fGVufDB8fDB8fA%3D%3D&w=1000&q=80');
            height: 88vh;">
            
            <div class="align-items-center">
                <div class="d-flex flex-column justify-content-end float-right mt-5" ></div>
                <div id="contact" class="container-fluid text-white pt-5" style="background:rgba(1,1,1,0.5);">
                    <h1 class="text-start">CONTACT</h1>
                        <div class="row">
                            <div class="col-sm-5">
                            <p>Contact us and we'll get back to you within 24 hours.</p>
                            <p><span class="glyphicon glyphicon-map-marker"></span>Dehiwala Sri Lanka</p>
                            <p><span class="glyphicon glyphicon-phone"></span> 0778874140</p>
                            <p><span class="glyphicon glyphicon-envelope"></span> thajudeenShakeer@yahoo.com</p>
                            </div>
                            <div class="col-sm-7">
                        <div class="row">
                                <div class="col-sm-6 form-group">
                                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
  </div>
</div>
</div>
            </div>
    </div>


</body>

</html>