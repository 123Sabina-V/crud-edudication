<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests\CompanyPostRequest;

class CompaniesController extends Controller
{
    public function get(){
        echo 'get';
    }
    public function create(CompanyPostRequest $request){
        dd($request->validated());
       return view('post.create');
    }
    public function store(CompanyPostRequest $request){
       //dd($request->validated());
        Company::create($request->validated());

        return redirect()->route('components.companies');
    }

    public function addEmploye(){
        echo 'addEmployee';
    }
    public function removeEmploye(){
        echo 'removeEmploye';
    }
    public function update(){
        
    }
    public function status(){
        echo 'status';
    }
    public function delete(){
        echo 'delete';
    }
}
