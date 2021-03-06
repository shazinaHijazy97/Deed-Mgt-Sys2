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
                    <li class="nav-item active"><a href="/" class="nav-link">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="about-us" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
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
                <div class="d-flex flex-column justify-content-end float-right mt-5" >
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Login Form -->
                        <form ACTION = "{{route('system-login')}}" METHOD = "POST">
                        @csrf
                        <input type="email" id="login" class="fadeIn second" name="email" placeholder="EMAIL" required autofocus>
                        @if ($errors->has('email'))
                        <span class = "text-danger">{{$errors->first('email')}}</span>
                        @endif
                        <input type="password" id="password" class="fadeIn third" name="password" placeholder="PASSWORD" required>
                        @if ($errors->has('password'))
                        <span class = "text-danger">{{$errors->first('password')}}</span>
                        @endif
                        <button type="submit" class="submit-button btn btn-primary fadeIn fourth" >LOG IN </button>
                        <br>
                        <a class="underlineHover" href="forgot-password">FORGOT PASSWORD</a>
                        </form>

                        <!-- Remind Passowrd -->
                        <!-- <div id="formFooter"> -->
                        <a href="{{url('client-register')}}">
                        <button type="" class="btn btn-dark fadeIn fourth mb-4" >REGISTER</button></a>
                        <!-- <a class="underlineHover" href="#">REGISTER</a> -->
                        <!-- </div> -->

                    </div>
                </div>
            </div>
    </div>


</body>

</html>