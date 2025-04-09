<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/pagination.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg container-fluid py-2 pb-2" style="background-color: rgb(56, 56, 56);">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#"><b>Navbar</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{URL::route('userView')}}">View Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{URL::route('createUser')}}">Create User</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link active text-white" href="{{url('/destroy-session')}}">Logout</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    