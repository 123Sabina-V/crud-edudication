<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests\CompanyPostRequest;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;
use App\Models\MyData;
// use App\MyData as MyData;

class CompaniesController extends Controller
{
    public function submit(CompanyPostRequest $req)
    {
        $data = $req->validated();
        $user = Auth::user();

        $company = new Companies();
        $company->user_id = $user->id;
        $company->name = $req = $data['name'];
        $company->email = $req = $data['email'];
        $company->website = $req = $data['website'];

        $company->save();

        return redirect()->back();
    }

    public function get()
    {
        $user = Auth::user();
        $companies = Companies::where("user_id", $user->id)->get();
        $employees = Employees::where("user_id", $user->id)->get();
        return view('companies.index', [
            "сompanies" => $companies,
            "employees" => json_encode($employees)
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $data = $request->except("_token");

            $company = new Companies();
            // $company->company_id = $user->id;
            $company->user_id = $user->id;
            $company->name = $data['name'];
            $company->website = $data['website'];
            $company->email = $data['email'];
            $company->save();

            return redirect()->route('companies');
        }

        $companies = Companies::select('id', 'name')->where("active", 1)->where("user_id", $user->id)->get();

        return view("companies.create", [
            "companies" => $companies
        ]);
    }
    // public function create(CompanyPostRequest $request)
    // {
    //     dd($request->validated());
    //     return view('post.create');
    // }
    public function store(CompanyPostRequest $request)
    {
        //dd($request->validated());
        Companies::create($request->validated());

        return redirect()->route('components.companies');
    }


    public function delete($id)
    {
        $user = Auth::user();
        $companies = Companies::find($id);
        if ($companies) {
            $companies->delete();
        }
        return redirect()->route('companies');
    }


    public function edit(Request $request)
    {
        $user = Auth::user();
        $company = Companies::find($request->id);

        if ($request->isMethod("post")) {
            $data = $request->all();
            $company->name = $data['name'];
            $company->website = $data['website'];
            $company->email = $data['email'];
            $company->update();

            return redirect()->route('companies');
        }

        return view('companies.edit', [
            'company' => $company
        ]);
    }

    public function assignEmployee(Request $request)
    {
        $data = $request->except("_token");

        $employee = Employees::find((int)$data['employee_id']);
        $employee->company_id = (int)$data['company_id'];
        $employee->save();
        // $data = Employees::find($request->employee_id);
        // $data->company_id = $request->company_id;
        // $data->update();
    }
}
