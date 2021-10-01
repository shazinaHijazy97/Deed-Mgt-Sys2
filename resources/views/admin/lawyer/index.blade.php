<html>
<head>
    <title>Lawyer Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="pull-right">
            <a href="{{route('admin-lawyers.create')}}">Create New Lawyer</a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>NIC</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
            </tr>
            @foreach ($lawyers as $lawyer)
            <tr>
            <td>{{$lawyer->id}}</td>
            <td>{{$lawyer->fname}}</td>
            <td>{{$lawyer->lname}}</td>
            <td>{{$lawyer->gender}}</td>
            <td>{{$lawyer->nic}}</td>
            <td>{{$lawyer->contact}}</td>
            <td>{{$lawyer->address}}</td>
            <td>{{$lawyer->email}}</td>
            <td><a href="{{route('admin-lawyers.edit', $lawyer->id)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('admin-lawyers.destroy',$lawyer->id)}}" method="POST">
                @csrf
                @method('DELETE')
            <!-- <a href="#" class="btn btn-danger">Delete</a> -->
            <button type="submit" class="btn btn-danger mt-1">Delete</button>
            </form>
            </td>
            </tr>
            @endforeach
        </table>

    </div>

</body>

</html>