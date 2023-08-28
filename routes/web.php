<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('/', function () {
//     return view('app');
// });

Route::controller(UserController::class)->group(function() {
    Route::get('/admin', 'index')->name('index')->middleware('auth'); //admin homepage
    Route::get('/admin/register', 'register')->name('register'); //add admin
    Route::get('/admin/login', 'login')->name('login')->middleware('guest');; //admin login form
    Route::post('/admin/process', 'process');//admin login process
    Route::post('/admin/store', 'store')->name('store'); //admin after register
    Route::post('/admin/logout', 'logout')->name('logout'); //admin logout
});

Route::controller(StaffController::class)->group(function() {
    Route::get('/admin/staff', 'index')->middleware('auth'); //staff list
    Route::get('/admin/staff/add', 'create')->middleware('auth'); //add staff
    Route::post('/admin/staff/add', 'store'); //add staff post
    Route::get('/admin/staff/{staff}', 'show')->middleware('auth'); //view staff
    Route::put('/admin/staff/{staff}', 'update')->middleware('auth'); //edit staff
    Route::delete('/admin/staff/{staff}', 'destroy'); //delete staff
});

Route::controller(PatientController::class)->group(function() {
    Route::get('/admin/patients', 'index')->middleware('auth');
    Route::get('/admin/patients/add', 'create')->middleware('auth');
    Route::post('/admin/patients/add', 'store'); 
    Route::get('/admin/patients/{patient}', 'show')->middleware('auth');
    Route::put('/admin/patients/{patient}', 'update')->middleware('auth');
    Route::delete('/admin/patients/{patient}', 'destroy');
});

Route::controller(PrescriptionController::class)->group(function() {
    Route::get('/admin/prescriptions', 'index')->middleware('auth');
    Route::get('/admin/prescriptions/add', 'create');
    Route::get('/admin/prescriptions/addFromPatient', 'createFromPatient');
    Route::post('/admin/prescriptions/add', 'store');
    Route::get('/admin/prescriptions/view/{id}', 'view');
    Route::get('/admin/prescriptions/viewFromPatient/{id}', 'viewFromPatient');
    Route::get('/admin/prescriptions/download/{filename}', 'download');
    Route::put('/admin/patients/prescriptions/{patient}', 'update');
    Route::delete('/admin/prescriptions/{prescription}', 'destroy');
});