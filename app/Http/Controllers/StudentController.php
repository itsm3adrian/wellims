<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Products;
use App\Models\IssuedRequests;
use Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function store(Request $request){
        // print_r($request->all());die();
        $student = new Student;
        $student->fullname=$request->fullname;
        $student->email=$request->email;
        $student->phoneno=$request->phoneno;
        $student->password=Hash::make($request->password);
        $student->cpassword = $request->cpassword;
        $student->department = $request->department;
        $student->rollno = $request->rollno;
        $student->save();

        Session::flash('success', 'Registration successful.');

        // Redirect back with success message
        return redirect()->back();
        
    }

    public function checkLogin(Request $request){
        // print_r($request->all());die();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
    
    
        ]);
    
        // Attempt to log the user in
        $student = Student::where('email', $credentials['email'])->first();
    
        if (!$student || !Hash::check($credentials['password'], $student->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    
        // Store student information in session
        $request->session()->put('student', $student);
    
        return redirect('/raiseissue');
    }

    public function GetRequest(Request $request){
        $student = $request->session()->get('student');
        $developmentboards = Products::where('product_type','development board')->pluck('product_title','id'); 
        // print_r($developmentboards);die();
        $equipments = Products::where('product_type','equipments')->pluck('product_title','id'); 
        return view('student.raiserequest',compact('student','developmentboards','equipments'));
    }

    
    public function studentLogout(Request $request){
        $request->session()->forget('student');
        return view('student.index');
    }

    public function sendRequest(Request $request){
        // print_r($request->all());die();
        IssuedRequests::create($request->all());
        Session::flash('success', 'Issue Request sent successfully!!');
        return redirect()->back();
    }


    

    
}