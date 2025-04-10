<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="/css/pagination.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg container-fluid py-2 pb-2" style="background-color: rgb(56, 56, 56);">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{url('/')}}"><b>Navbar</b></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-pills">
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{url('/')}}">Home</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="btn btn-dark dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{URL::route('users.index')}}">View</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="{{URL::route('users.create')}}">Create</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-dark dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                Department
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{URL::route('departments.index')}}">View</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="{{URL::route('departments.create')}}">Create</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-dark dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false">
                                Semester
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{URL::route('semesters.index')}}">View</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="{{URL::route('semesters.create')}}">Create</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link active text-white" href="{{url('/destroy-session')}}">Logout</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    