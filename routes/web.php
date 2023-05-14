<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\listourController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VendorManagementController;
use App\Http\Controllers\TourListController;
use App\Http\Controllers\DetailPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityTourController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tourlist', [TourListController::class, 'index'])->name('list.index');
Route::get('/detailpage', [DetailPageController::class, 'index'])->name('detailpage.index');
Route::get('/signup', [HomeController::class, 'signup']);


// Route::get('/list', [listourController::class, 'index'])->name('list.index');
Route::get('/about', [AboutusController::class, 'index'])->name('about.index');
Route::get('/SignIn', [SignInController::class, 'index']);
Route::get('/phoneNumber', [SignInController::class, 'phoneNumber']);
Route::get('/input', [SignInController::class, 'input']);
Route::get('/verification', [SignInController::class, 'verification']);




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


// Route::get('/admins', function () {
//     return view('admin.dashboard');
// })->name('admins');


Route::middleware('admin')->group(function () {
    Route::get('/admins', function () {return view('admin.dashboard');})->name('admins');
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

// Vendor
Route::resource('/vendor', VendorController::class);
Route::resource('vendor.tours', TourController::class);
Route::resource('vendor.activity',ActivityController::class);


Route::resource('vendor.tours.images', TourImageController::class)->only([ 'index','create' ,'store', 'destroy']);
Route::resource('vendor.tours.activity',ActivityTourController::class);
Route::get('vendor/tours/{tour}/activity/{activity}/add', [ActivityTourController::class ,'add'])->name('vendor.tours.activity.add');

// Route::resource('vendor.tours.activity', ActivityTourController::class)->only([ 'index','create' ,'store', 'destroy']);


// Route::get('vendor/tours/{tour}/activity/search',[ ActivityTourController::class, 'search'])->name('vendor.tours.activity.search');



Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class ,'show'])->name('register.show');
    Route::post('/register', [RegisterController::class ,'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class ,'show'])->name('login.show');
    Route::post('/login', [LoginController::class ,'login'])->name('login.perform');

});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class ,'perform'])->name('logout.perform');
});



//USER MANAGEMENT ROUTE

Route::get('/view_user', [UserController::class, 'index']);
Route::get('/create_user', [UserController::class, 'create']);
Route::post('/user_store', [UserController::class, 'store']);
Route::get('/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::get('/delete_user/{id}', [UserController::class, 'destroy']);