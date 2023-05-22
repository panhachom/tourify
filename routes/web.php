<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\listourController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ProfileSettingController;
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
use App\Http\Controllers\AdminManageTourContoller;
use App\Http\Controllers\AdminVendorController;
use App\Http\Controllers\CountryTourController;
use App\Http\Controllers\TourDateController;
use App\Http\Controllers\ResetPasswordController;


use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UpdateController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/detailpage', [DetailPageController::class, 'index'])->name('detailpage.index');
Route::get('/signup', [HomeController::class, 'signup']);

Route::resource('tour_list',TourListController::class);



// Route::get('/list', [listourController::class, 'index'])->name('list.index');
Route::get('/about', [AboutusController::class, 'index'])->name('about.index');
Route::get('/SignIn', [SignInController::class, 'index']);
Route::get('/phoneNumber', [SignInController::class, 'phoneNumber']);
Route::get('/input', [SignInController::class, 'input']);
Route::get('/verification', [SignInController::class, 'verification']);

Route::get('/list', [listourController::class, 'index']);
Route::get('/profile', [ProfileSettingController::class, 'index']);
Route::post('/profile', [ProfileSettingController::class, 'updatePassword'])->name('update-password');


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
    Route::get('/admins/view_slider', [SliderController::class, 'index']);
    Route::get('/admins/create_slider', [SliderController::class, 'create']);
    Route::post('/admins/slider_store', [SliderController::class, 'store']);
    Route::get('/admins/slider/{id}/edit', [SliderController::class, 'edit']);  
    Route::get('/admins/delete_slider/{id}', [SliderController::class, 'destroy']);
    Route::put('/admins/slider/{id}', [SliderController::class, 'update']); 
    
    Route::get('/view_user', [UserController::class, 'index'])->name('admins.view_user');
    Route::get('/create_user', [UserController::class, 'create']);
    Route::post('/user_store', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('/delete_user/{id}', [UserController::class, 'destroy']);
    
    // Route::get('/delete_user/{id}', [UserController::class, 'destroy']);
    Route::get('/reset_password', [UserController::class, 'reset_password']);
    Route::get('/show_customer',[UserController::class, 'show_customer']); 
    Route::get('/show_vendor',[UserController::class, 'show_vendor']);
    Route::get('/show_admin',[UserController::class, 'show_admin']);

    Route::get('/testroute', function() {
        $name = "Funny Coder";

        // The email sending is done using the to method on the Mail facade
        Mail::to('sethamanith3333@gmail.com')->send(new MyTestEmail($name));
    });
    
    Route::resource('promotion',PromotionController::class);
    Route::post("/tours", [PromotionController::class, 'getTour'])->name('get-tour');

  
    Route::post("/tours", [PromotionController::class, 'getTour'])->name('get-tour');

    Route::get('/reset_password_form', [ResetPasswordController::class, 'index']);
    Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/reset-password', [ResetPasswordController::class, 'reset']);

    //vendor Management
    Route::get('/view_vendor', [AdminVendorController::class, 'index'])->name('admins.view_vendor');
    Route::get('/create_vendor',[AdminVendorController::class, 'create']);
    Route::post('/vendor_store', [AdminVendorController::class, 'store']);
    Route::get('/vendor/{id}/edit', [AdminVendorController::class, 'edit']);
    Route::put('/vendor/{id}', [AdminVendorController::class, 'update']);
    Route::get('/delete_vendor/{id}', [AdminVendorController::class, 'destroy']);

    //Manage All Tour Post
    Route::get('/view_all_post', [AdminManageTourContoller::class, 'index']);
    Route::get('/tour/{id}/edit',[AdminManageTourContoller::class, 'edit']);
    Route::put('/tour/{id}', [AdminManageTourContoller::class, 'update']);
    Route::get('/delete_tour_post/{id}', [AdminManageTourContoller::class, 'destroy']);

});


Route::get('/test', function () {
    return view('admin.test');
});


//slider Management


//Vendor Management
Route::get('/view_manage_vendor', [VendorManagementController::class, 'index']);




// Vendor
Route::resource('/vendor', VendorController::class);
Route::resource('vendor.tours', TourController::class);
Route::resource('vendor.activity',ActivityController::class);
Route::resource('vendor.booking',VendorBookingController::class);
Route::get('/vendor/booking/approved_booking/{vendor}',[VendorBookingController::class, 'approved_booking'] )
    ->name('vendor.booking.approved_booking');
Route::get('/vendor/booking/unapproved_booking/{vendor}',[VendorBookingController::class, 'unapproved_booking'] )
->name('vendor.booking.unapproved_booking');






Route::resource('vendor.tours.images', TourImageController::class)->only([ 'index','create' ,'store', 'destroy']);
Route::resource('vendor.tours.tour_date', TourDateController::class);

Route::resource('vendor.tours.activity',ActivityTourController::class);
Route::get('vendor/tours/{tour}/activity/{activity}/add', [ActivityTourController::class ,'add'])->name('vendor.tours.activity.add');
Route::delete('vendors/{vendor}/tours/{tour}/activities/{activity}', [TourController::class ,'destroyActivity'])->name('vendor.tours.activity.destroy');


Route::resource('vendor.tours.country',CountryTourController::class);
Route::get('vendor/tours/{tour}/country/{country}/add', [CountryTourController::class ,'add'])->name('vendor.tours.country.add');
Route::delete('vendors/{vendor}/tours/{tour}/countries/{country}', [TourController::class ,'destroyCountry'])->name('vendor.tours.country.destroy');


// Booking 

Route::resource('tour_list.booking',BookingController::class);





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




// Vendor Booking 
