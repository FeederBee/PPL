<?php

use Illuminate\Support\Facades\Route;

#Controller
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\UploadImageController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

  
Route::controller(UserController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
    
    Route::get('profile', 'profile')->name('profile');

    Route::put('profile', 'update')->name('profile.update');


});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

Route::get('/profile', [UserController::class, 'show'])->name('profile');
// Route::get('/register', [UserController::class, 'showreg'])->name('status.user');

Route::resource('products', ProductController::class);


// Route::get('/profile', [UploadImageController::class, 'show'])->name('profile.show');
// Route::post('/profile/image', [UploadImageController::class, 'updateImage'])->name('profile.image');