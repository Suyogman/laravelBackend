<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(Request $request){
       // $employees = Employee1::orderBy('id','asc')->paginate(10);
        return view('Employee.form');
    }


    public function store(Request $request){
        $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'password' => 'required|',
         'confirm' => 'required|same:password',
         //'emp_id' => 'required|exists:'.Company::class.',id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);

        //$credentials = $request->only();
/* 
        try {
        $employee = new Employee1();
        $employee ->company()->associate($request->input('emp_id'));
        $employee->fill($request->input());

        $employee->save();

        } catch(\Exception $e) {
         var_export($e->getMessage());
         exit;
        }
*/       



    return redirect()->route('login')->with('success','Employees has been registered');
    
 }

 public function login(){
    // $employees = Employee1::orderBy('id','asc')->paginate(10);
     return view('Employee.login');
 }

 public function logsubmit(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
        //'emp_id' => 'required|exists:'.Company::class.',id',
       ]);

    $credentials = $request->validate([
        'email' => ['required','email'],
        'password' => ['required']
    ]);

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }
 
    return back()->withErrors([
        'email' => 'The provided credentials does not match',
    ])->onlyInput('email');
 }

 public function dashboard(){
    print_r(Auth::user()->toArray());
 }

 public function profile(){
    print_r(Auth::user()->toArray());
 }

 public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('success','Employees has been logout successfully');
 }
}
