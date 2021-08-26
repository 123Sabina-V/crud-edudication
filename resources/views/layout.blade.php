<!DOCTYPE html>
<html lang="eng">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>@yield('title')</title>
    </head>
    <body>
    
        <ul>
            <li><a href = "/employees">Employees</a></li>
            <li><a href = "/companies">Companies</a></li>
            <li><a href = "/welcome">Welcome</a></li>
            <li><a href = "/createEmployees">Create Employee</a></li>
            <li><a href = "/createCompanies">Create Companie</a></li>
        </ul>
        @yield('content')
    </body>
</html>