<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\RawatInapController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::controller(HomeController::class)->group(function(){
            Route::get('home', 'index');
            Route::get('ubah_profile', 'ubah_profile');
            Route::put('update_profile', 'update_profile');
            Route::get('ubah_password', 'ubah_password');
            Route::put('update_password', 'update_password');
        });

        Route::resource('ruang', RuangController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('rawat-inap', RawatInapController::class);
        Route::resource('pasien', PasienController::class);
        
        Route::resource('user', UserController::class);
        Route::get('staff', [UserController::class, 'staff']);
        
        Route::controller(PembayaranController::class)->group(function(){
            Route::get('pembayaran', 'index');
            Route::get('pembayaran/{id}/create', 'create');
            Route::post('pembayaran', 'store');
            Route::get('pembayaran/export', 'export');
        });
    });
});
