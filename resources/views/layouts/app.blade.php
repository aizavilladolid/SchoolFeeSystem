{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background-color: #efecd9;
            font-family: Arial, sans-serif;
        }

        .navbar-custom{
            background-color: #b7b08f;
        }

        .navbar-brand{
            font-weight: bold;
            color: white !important;
        }

        .nav-btn{
            background-color: white;
            color: #5c5332;
            border: none;
            font-weight: 600;
            margin-left: 5px;
            border-radius: 8px;
        }

        .nav-btn:hover{
            background-color: #ece7d0;
        }

        .page-title{
            font-weight: bold;
            color: #3e2a00;
        }

        .custom-card{
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .table thead{
            background-color: #b7b08f;
            color: white;
        }

        .btn-primary{
            background-color: #8d7b55;
            border: none;
        }

        .btn-primary:hover{
            background-color: #746445;
        }

        .btn-success{
            background-color: #6d8b74;
            border: none;
        }

        .btn-success:hover{
            background-color: #56705d;
        }

        .btn-warning{
            color: white;
        }

        .btn-danger{
            background-color: #b85c5c;
            border: none;
        }

        .form-control{
            border-radius: 8px;
            padding: 10px;
        }

        .badge-success{
            background-color: #6d8b74;
        }

        .badge-optional{
            background-color: #999;
        }

        label{
            font-weight: 600;
            margin-bottom: 5px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="#">
            School Fee System
        </a>

        <div>

            <a href="{{ route('students.index') }}"
               class="btn nav-btn btn-sm">
                Students
            </a>

            <a href="{{ route('fees.index') }}"
               class="btn nav-btn btn-sm">
                Fees
            </a>

        </div>

    </div>

</nav>

<div class="container py-4">

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @yield('content')

</div>

</body>
</html>