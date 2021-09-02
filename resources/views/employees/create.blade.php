@extends('layout')

@section('title','Create Employee')

@section("content")
<div class="container">
    <form action='{{ route("create_employee") }}' method='POST'>
        @csrf
        <h1>Create employee</h1>
        <div class="row align-items-center">
            <div class="col-6">
                <select name="company_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='first_name'>Enter first_name</label>
                    <input type='text' name='first_name' id='first_name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='last_name'>Enter last_name</label>
                    <input type='text' name='last_name' id='last_name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='phone'>Enter phone</label>
                    <input type='text' name='phone' id='phone' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='email'>Enter email</label>
                    <input type='text' name='email' id='email' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button class='btn btn-success'>Create</button>
            </div>
        </div>
    </form>
</div>
@endsection