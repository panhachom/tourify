<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\detailpageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/detailpage', [detailpageController::class, 'index']);
Route::get('/signup', [HomeController::class, 'signup']);



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// admin dashbaord Route backend only

// Route::get('/theadmin', [AdminController::class, 'index']);


 Route::get('/admins', function () {
    return view('admin.dashboard');
});

Route::get('/test', function () {
    return view('admin.test');
});


//slider Management
Route::get('/view_slider', [SliderController::class, 'index']);
Route::get('/create_slider', [SliderController::class, 'create']);
Route::post('/slider_store', [SliderController::class, 'store']);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);  
Route::get('/delete_slider/{id}', [SliderController::class, 'destroy']);
Route::put('/slider/{id}', [SliderController::class, 'update']);

//Vendor Management
Route::get('/view_manage_vendor', [VendorManagementController::class, 'index']);