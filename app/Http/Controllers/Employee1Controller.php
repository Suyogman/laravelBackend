<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee1;
use App\Models\Company;



class Employee1Controller extends Controller
{
    //

    public function index(Request $request){
        $employees = Employee1::orderBy('id','asc')->paginate(10);
        return view('Employee.index', compact('employees'));
    }

    public function create(){
        $companies = Company::all();
        return view('Employee.create', compact('companies'));
    }

    public function store(Request $request){
           $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'emp_id' => 'required|exists:'.Company::class.',id',
           ]);

           try {
           $employee = new Employee1();
           $employee ->company()->associate($request->input('emp_id'));
           $employee->fill($request->input());

           $employee->save();

           } catch(\Exception $e) {
            var_export($e->getMessage());
            exit;
           }
           

           return redirect()->route('employees.index')->with('success','Employees has been created');
        
    }
    


    //Delete method in laravel
/*
    public function destroy(Employee1 $employee){
        $employee->delete();

        return response()->json([]);
    }
    */
}


