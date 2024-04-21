<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\IssuedRequests;

class AdminController extends Controller
{
    public function Admin(){
        return view('admin.index');
    }

    public function CheckAdminLogin(Request $request){
        $credentials = $request->validate([
            'adminemail' => 'required|email',
            'adminpassword' => 'required|min:8',
    
    
        ]);

        $admin = AdminModel::where('adminemail', $credentials['adminemail'])->first();
    
        if (!$admin || !Hash::check($credentials['adminpassword'], $admin->adminpassword)) {
            return back()->withErrors(['adminemail' => 'Invalid credentials'])->withInput();
        }
    
        // Store student information in session
        $request->session()->put('admin', $admin);
    
        return redirect('/admindashboard');
    
    }

    public function getAdminDashboard(Request $request){
        $admin = $request->session()->get('admin');
        // print_r($staff);die();    
        $products = Products::all();
        $staffreqs = IssuedRequests::select('issuedrequests.*', 'products.product_title as product_title')
        ->join('products', 'issuedrequests.reqdevboard', '=', 'products.id')
        ->where('issuedrequests.req_status', 1)
        ->get();
        return view('admin.dashboard',compact('admin','products','staffreqs'));
       
    }

    public function adminLogout(Request $request){
        $request->session()->forget('admin');
        return view('admin.index');
    }

    public function changeAdminStatus($id){
        $adminrequest = IssuedRequests::findOrFail($id);
        $adminrequest->adminreq_status = 1;
        $adminrequest->save();
        return response()->json(['message' => 'Request status updated successfully']);
    }
}
