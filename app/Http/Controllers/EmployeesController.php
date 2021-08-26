<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function create(Request $request){
        $data = $request->all();
        dd($data);
        //Employees
    }

    public function update(Request $request){
        echo 'update';
    }

    public function status(Request $request){
        echo 'status';
    }

    public function delete(Request $request){
        echo 'delete';
    }
}
