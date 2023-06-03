<?php

use Illuminate\Support\Facades\Route;

#Controller
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\ListTemanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PesanController;

// Starter Page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// End Route

// Route User
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

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile/{id}', [UserController::class, 'show']);
// End Route

// Route Products
Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// End Route

// Route Bahan
Route::resource('Bahan', BahanController::class);
Route::put('/Bahan/{bahan}/update-stok', [BahanController::class, 'updateStok'])->name('Bahan.updateStok');
// End Route

// Route addfriend (komunitas)
Route::resource('addfriends', ListTemanController::class);
Route::get('/owners', [ListTemanController::class, 'index'])->name('owners.index');
// End Route

// Route Pesanan
Route::resource('pesanans', PesananController::class);

Route::get('/pemesanan', [PesananController::class, 'showDaftar'])->name('pesanans.show');
Route::put('/pesanans/{id}/status', [PesananController::class, 'Status'])->name('pesanans.Status');

Route::get('/historypemesanan', [PesananController::class, 'showHistory'])->name('pesanans.history');
// End Route

// Route Pesanan
Route::resource('ulasans', UlasanController::class);
Route::get('/ulasan', [UlasanController::class, 'show']);
// End Route

// Pesan
Route::get('/messages', [PesanController::class, 'index'])->name('messages.index');
Route::get('/messages/{user}', [PesanController::class, 'show'])->name('messages.show');
Route::post('/messages/{user}', [PesanController::class, 'store'])->name('messages.store');

Route::get('/pesan', function () {
    return view('message.pesan');
});
// End Pesan Section

