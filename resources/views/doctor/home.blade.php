<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor:home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>{{Auth::guard('doctor')->user()->name}}</td>
                    <td>{{Auth::guard('doctor')->user()->email}}</td>
                    <td>{{Auth::guard('doctor')->user()->phone}}</td>
                    <td><a href="{{route('doctor.logout')}}" id="logout-btn">Logout</a></td>
                    <form action="{{route('doctor.logout')}}" id="logout-form" method="post" class="d-none">@csrf</form>
            </tr>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('logout-btn').addEventListener('click', (e)=>{
            e.preventDefault();
            document.getElementById('logout-form').submit();
            });
    </script>
</body>
</html>
