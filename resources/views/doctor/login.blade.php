<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor:Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-4 offset-md-4">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <h3>Doctor: Login Form</h3><hr>
            <form action="{{route('doctor.check')}}" method="post">
                @csrf
                <div class="form-group mt-3">
                    <label for="name">Email</label>
                    <input value='{{old("email")}}' id="email" name="email" type="text" class="form-control" placeholder="Enter email">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Password</label>
                    <input value='{{old("password")}}' id="password" name="password" type="password" class="form-control" placeholder="Enter password">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <div class="form-group mt-3">
                    <input  class="btn btn-success" type="submit" value="Login">
                </div><br>
                <a href="{{route('doctor.register')}}">Click here to to register</a>
            </form>
        </div>
    </div>
</body>
</html>
