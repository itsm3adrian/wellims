<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\staffcontroller;
use App\Http\Controllers\productController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Student Routes
Route::get('/', function () {
    return view('student.index');
});
Route::post('register',[StudentController::class, 'store'])->name('student.register');
Route::post('/check-login',[StudentController::class,'checkLogin'])->name('student.login');
Route::get('/raiseissue',[StudentController::class,'GetRequest']);
Route::get('/studentlogout/{id}',[StudentController::class,'studentLogout'])->name('student.logout');
Route::post('send/request',[StudentController::class,'sendRequest'])->name('send.request');



// product routes
Route::get('get/equipment',[productController::class,'GetEquipment'])->name('get.equipment');
Route::post('add/product',[productController::class, 'addProduct'])->name('add.product');

// Route::get('product/details/{id}',[productController::class, 'ShowProduct'])->name('product.details');



// staff routes
Route::get('get/stafflogin',[staffcontroller::class,'GetStaffLogin'])->name('get.stafflogin');
Route::post('registerStaff',[staffcontroller::class,'RegisterStaff'])->name('staff.register');
Route::post('/check-stafflogin',[staffcontroller::class,'checkStaffLogin'])->name('staff.login');
Route::get('/dashboard',[staffcontroller::class,'dashboard'])->name('dashboard');
Route::get('/requests',[staffcontroller::class,'requests'])->name('requests');
Route::get('/stafflogout/{id}',[staffcontroller::class, 'staffLogout'])->name('staff.logout');
Route::post('/changestatus/{id}', [StaffController::class, 'changeStatus'])->name('change.reqstatus');
Route::post('/changestatusdeny/{id}',[StaffController::class, 'changeStatusdeny'])->name('change.denyreqstatus');
   


// Admin Routes
Route::get('/admin',[AdminController::class, 'Admin'])->name('admin.login');
Route::post('/admin/checkadmin',[AdminController::class, 'CheckAdminLogin'])->name('check.adminlogin');
Route::get('/admindashboard',[AdminController::class, 'getAdminDashboard']);
Route::get('/adminlogout/{id}',[AdminController::class, 'adminLogout'])->name('admin.logout');
Route::post('/changeadminreqstatus/{id}', [AdminController::class, 'changeAdminStatus'])->name('change.adminreqstatus');