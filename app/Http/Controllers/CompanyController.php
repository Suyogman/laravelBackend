<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function index(Request $request) {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function store(Request $request){

        $company = new Company();
        $company->email = $request->input('email');
        $company->fill($request->input());
        $company->validate()->save();
        return response()->json($company);
    }

    // get method in laravel

    public function show(Company $company){
        return response()->json($company);
    }
    // update(PUT) method in laravel

    public function update(Company $company, Request $request){
        $company->fill($request->input());
        $company->save();
        return response()->json($company);
    }
    

    //Delete method in laravel

    public function destroy(Company $company){
        $company->delete();

        return response()->json([]);
    }
}
