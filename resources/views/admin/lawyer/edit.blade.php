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
        <form action="{{route('admin-lawyers.update', $lawyer->id)}}" method="POST">
        @csrf
        @method('PUT')

        First Name: <input type="text" name="fname" value="{{$lawyer->fname}}"> <br>
        Last Name: <input type="text" name="lname" value="{{$lawyer->lname}}"> <br>
        Gender : <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select> <br>
        NIC : <input type="text" name="nic" value="{{$lawyer->nic}}"> <br>
        Contact : <input type="text" name="contact" value="{{$lawyer->contact}}"> <br>
        Address: <input type="text" name="address" value="{{$lawyer->address}}"> <br>
        Email: <input type="text" name="email" value="{{$lawyer->email}}"> <br>
        Password: <input type="text" name="password" value="{{$lawyer->password}}"> <br>
        <button type="submit">Submit</button>

        </form>
    </div>

    </div>

</body>

</html>