<!DOCTYPE html>
<html lang="eng">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/index.js')}}" defer></script>
</head>

<body>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/welcome">Welcome</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/employees">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/companies">Companies</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Editing</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/employees/create">Create Employee</a></li>
                            <li><a class="dropdown-item" href="/companies/create">Create Company</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
            </div>
    </nav>
    @if($errors->any())
    <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}
                @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        @yield('content')
    </div>
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <a class="text-reset" href="/welcome">Welcome</a>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <a class="text-reset" href="/employees">Employees</a>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <a class="text-reset" href="/companies">Companies</a>
            </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2021 :
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">CRUD.com</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>