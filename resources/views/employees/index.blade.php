@extends ('layout')

@section('title','Employees')

@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope='col'>№</th>
                <th scope='col'>first_name</th>
                <th scope='col'>last_name</th>
                <th scope='col'>phone</th>
                <th scope='col'>email</th>
                <th scope='col'>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <th scope='row'>{{$employee->id}}</th>
                <th scope='row'>{{$employee->first_name}}</th>
                <th scope='row'>{{$employee->last_name}}</th>
                <th scope='row'>{{$employee->phone}}</th>
                <th scope='row'>{{$employee->email}}</th>
                <th scope='row'>
                    <form action="{{route('delete_employees', ['id' => $employee->id])}}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Delete</button>
                    </form>
                </th>
                <th scope='row'>
                    <form action="{{route('edit_employee', ['id' => $employee->id])}}" method="GET">
                        @csrf
                        <button class="btn btn-primary">Edit</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection