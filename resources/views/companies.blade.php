@extends ('layout')

@section('title', 'Companies')

@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope='col'>№</th>
                <th scope='col'>name</th>
                <th scope='col'>email</th>
                <th scope='col'>website</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($сompanies as $company)
            <tr>
                <th scope='row'>{{$company->id}}</th>
                <th scope='row'>{{$company->name}}</th>
                <th scope='row'>{{$company->email}}</th>
                <th scope='row'>{{$company->website}}</th>
                <th scope='row'>
                    <form action="{{route('delete_companies', ['id' => $company->id])}}" method="DELETE">
                        @csrf
                        <button class="btn btn-primary">Delete</button>
                    </form>
                </th>
                <th scope='row'>
                    <form action="{{route('edit_companies', ['id' => $company->id])}}" method="EDIT">
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