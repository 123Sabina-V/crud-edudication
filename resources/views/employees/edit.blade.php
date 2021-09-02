@extends('layout')

@section('title','Edit Employee')

@section("content")
<div class="container">
    <form action='{{ route("edit_employee", ["id" => $employee->id ]) }}' method='POST'>
        @csrf
        <h1>Edit Employee</h1>
        <div class="row align-items-center">
            <div class="col-6">
                <select name="company_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach($companies as $company)
                    <option value="{{$company->id}}" @if($company->id === $employee->company_id)
                        selected
                        @endif
                        >{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='first_name'>Enter first_name</label>
                    <input type='text' value="{{$employee->first_name}}" name='first_name' id='first_name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='last_name'>Enter last_name</label>
                    <input type='text' value="{{$employee->last_name}}" name='last_name' id='last_name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='phone'>Enter phone</label>
                    <input type='text' value="{{$employee->phone}}" name='phone' id='phone' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='email'>Enter email</label>
                    <input type='text' value="{{$employee->email}}" name='email' id='email' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button class='btn btn-success'>Edit</button>
            </div>
        </div>
    </form>
</div>
@endsection