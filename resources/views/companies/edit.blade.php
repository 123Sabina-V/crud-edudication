@extends('layout')

@section('title','Edit Companies')

@section("content")
<div class="container">
    <form action='{{ route("edit_company", ["id" => $company->id ]) }}' method='POST'>
        @csrf
        <h1>Edit Company</h1>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='name'>name</label>
                    <input type='text' value="{{$company->name}}" name='name' id='name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='email'>Enter email</label>
                    <input type='text' value="{{$company->email}}" name='email' id='email' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='website'>Enter website</label>
                    <input type='text' value="{{$company->website}}" name='website' id='website' class='form-control'>
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