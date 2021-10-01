<html>
<head>
    <title>Lawyer Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="pull-right">
            <a href="{{route('admin-lawyers.index')}}">Lawyers</a>
        </div>
    <div class="container">
        <form action="{{route('admin-lawyers.store')}}" method="POST">
        @csrf

        First Name: <input type="text" name="fname"> <br>
        Last Name: <input type="text" name="lname"> <br>
        Gender : <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select> <br>
        NIC : <input type="text" name="nic"> <br>
        Contact : <input type="text" name="contact"> <br>
        Address: <input type="text" name="address"> <br>
        Email: <input type="text" name="email"> <br>
        Password: <input type="text" name="password"> <br>
        <button type="submit">Submit</button>

        </form>
    </div>

    </div>

</body>

</html>