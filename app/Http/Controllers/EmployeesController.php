<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeePostRequest;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    // public function submit(EmployeePostRequest $request)
    // {
    //     $data = $request->validated();
    //     $user = Auth::user();

    //     $employee = new Employees();
    //     $employee->user_id = $user->id;
    //     $employee->first_name = $data['first_name'];
    //     $employee->last_name = $data['last_name'];
    //     $employee->phone = $data['phone'];
    //     $employee->email = $data['email'];
    //     $employee->save();

    //     return redirect()->back();
    // }

    public function get(Request $request)
    {
        $user = Auth::user();

        $employees = Employees::where("user_id", $user->id)->get();

        return view("employees.index", [
            "employees" => $employees
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $data = $request->except("_token");

            $employee = new Employees();
            $employee->company_id = $data['company_id'];
            $employee->user_id = $user->id;
            $employee->first_name = $data['first_name'];
            $employee->last_name = $data['last_name'];
            $employee->phone = $data['phone'];
            $employee->email = $data['email'];
            +$employee->save();

            return redirect()->route('employees');
        }

        $companies = Companies::select('id', 'name')->where("active", 1)->where("user_id", $user->id)->get();

        return view("employees.create", [
            "companies" => $companies
        ]);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $employees = Employees::find($id);
        if ($employees) {
            $employees->delete();
        }
        return redirect()->route('employees');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $employee = Employees::find($request->id);
        $companies = Companies::select('id', 'name')->where("active", 1)->where("user_id", $user->id)->get();

        if (!$employee) {
        }

        if ($request->isMethod("post")) {
            $data = $request->all();
            $employee->company_id = $data['company_id'];
            $employee->first_name = $data['first_name'];
            $employee->last_name = $data['last_name'];
            $employee->phone = $data['phone'];
            $employee->email = $data['email'];
            $employee->update();

            return redirect()->route('employees');
        }

        return view('employees.edit', [
            "companies" => $companies,
            "employee" => $employee
        ]);
    }
    // public function create(EmployeePostRequest $request)
    // {
    //     // if ($request->isMethod('post')) {
    //     // }
    //     dd(1);

    //     $companies = Companies::select('id', 'name')->where("active", 1)->where("user_id", $user->id)->get();

    //     return view("employees.create", [
    //         "companies" => $companies
    //     ]);
    // }
}
