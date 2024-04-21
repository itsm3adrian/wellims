<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Hash;
use Session;
use App\Models\Products;
use App\Models\IssuedRequests;
use App\Mail\RequestStatusUpdate;
use Illuminate\Support\Facades\Mail;


class staffcontroller extends Controller
{
    public function GetStaffLogin(){
        return view('staff.index');
    }

    public function RegisterStaff(Request $request){
        $student = new Staff;
        $student->fullname=$request->fullname;
        $student->email=$request->email;
        $student->phoneno=$request->phoneno;
        $student->password=Hash::make($request->password);
        $student->cpassword = $request->cpassword;
        $student->department = $request->department;
        $student->empid = $request->empid;
        $student->save();

        Session::flash('success', 'Registration successful.');

        // Redirect back with success message
        return redirect()->back();
    }

    public function checkStaffLogin(Request $request){
        // print_r($request->all());die();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
    
    
        ]);
    
        // Attempt to log the user in
        $staff = Staff::where('email', $credentials['email'])->first();
    
        if (!$staff || !Hash::check($credentials['password'], $staff->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    
        // Store staff information in session
        $request->session()->put('staff', $staff);
    
        return redirect('/dashboard');
    }

    public function dashboard(Request $request){
        $staff = $request->session()->get('staff');
        // print_r($staff);die();    
        $products = Products::all();
        
        return view('staff.dashboard', compact('staff','products'));
    }

    public function requests(Request $request){
        $staff = $request->session()->get('staff');
        // print_r($staff);die();    
        $products = Products::all();

        // $requests = IssuedRequests::all();
        $requests = IssuedRequests::select('issuedrequests.*', 'products.product_title as product_title')
        ->join('products', 'issuedrequests.reqdevboard', '=', 'products.id')
        ->get(); 
        
        
        return view('staff.requests', compact('staff','products','requests'));
    }



    public function staffLogout(Request $request){
        $request->session()->forget('staff');
        return view('staff.index');
    }


    public function changeStatus(Request $request,$id){
        $staffName = $request->input('staffName'); 
        $request = IssuedRequests::findOrFail($id);
        $studentEmail = $request->semail;
        // print_r($studentEmail);die();
        $request->req_status = 1;
        $request->bystaff = $staffName;
        $request->save();
    // Send email notification to student
        Mail::to($studentEmail)->send(new RequestStatusUpdate('accepted'));
        return response()->json(['message' => 'Request stat us updated successfully']);
    }

    public function changeStatusdeny(Request $request,$id){
        $staffName = $request->input('staffName'); 
        $request = IssuedRequests::findOrFail($id);
        $studentEmail = $request->semail;
        // print_r($studentEmail);die();
        $request->req_status = 2;
        $request->bystaff = $staffName;
        $request->save();
    // Send email notification to student
        Mail::to($studentEmail)->send(new RequestStatusUpdate('denied'));
        return response()->json(['message' => 'Request status updated successfully']);
    }


}