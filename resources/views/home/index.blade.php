<html>
    <head>
    <title>DEED LAW GROUP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

<body>

    <div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
        <img src="{{asset('assets/img/logo.png')}}" id="icon" alt="User Icon" />
        </div>

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
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
        <a class="underlineHover" href="#">FORGOT PASSWORD</a> | 
        <a class="underlineHover" href="#">REGISTER</a>
        </div>

    </div>
    </div>

</body>

</html>