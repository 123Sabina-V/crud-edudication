<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeePostRequest;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function get(Request $request){
        $user = Auth::user();
        $data = $request->all();
           
        if(!$data['id']){
            $employees = Employees::where("user_id", $user->id)->get();
            return view(" ",[ 
                "employee" => $employees
            ]);  
        } else {
            $employee = Employees::where("id", $data['id'])->get();
            return view(" ",[ 
                "employee" => $employee
            ]);  
        } 
    }

    public function create(EmployeePostRequest $request){
        //$data = $request->validated();
        //dd($data);
        //Employees
        //dd($request->validated());
        //return view('post.create');
        dd(1);
        
    }

    public function store(EmployeePostRequest $request){
         dd($request->validated());
        Employee::create($request->validated());

        return redirect()->route('components.employees');
    }

    public function update(Request $request){
         
    }

    public function status(Request $request){
        echo 'status';
    }

    public function delete(Request $request){
        echo 'delete';
    }
}
