<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            line-height: 1.42857143;
            text-decoration: none;
            color: #337ab7;
            background-color: #fff;
            border: 1px solid #ddd;
            margin-left: -1px;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover {
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span {
            color: #fff;
            background-color: #337ab7;
            border-color: #337ab7;
            cursor: default;
        }
    </style>
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
                            <a class="nav-link text-white" href="{{url('/view')}}">View Users</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white" href="{{URL::route('createUser')}}">Create User</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{url('/destroy-session')}}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    