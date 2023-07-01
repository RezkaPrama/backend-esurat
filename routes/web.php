<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratKeluarDetailController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratMasukDetailController;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\Request;
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
    return view('auth.login');
});


//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        //route User
        Route::resource('/user', UserController::class, ['as' => 'admin']);
        // Route::get('/user/{userId}', [UserController::class, 'showImage'])->name('admin.user.showImage');

        // route Surat masuk
        Route::resource('/suratmasuk', SuratMasukController::class, ['as' => 'admin']);

        //route Surat masuk detail file
        Route::post('/suratMasukDetail/upload', [SuratMasukDetailController::class, 'upload'])->name('admin.suratMasukDetail.upload');
        Route::get('/suratMasukDetail/{userid}/{filename}/download', [SuratMasukDetailController::class, 'download'])->name('admin.suratMasukDetail.download');
        Route::get('/suratMasukDetail/{userid}/{filename}/previewPdf', [SuratMasukDetailController::class, 'previewPdf'])->name('admin.suratMasukDetail.previewPdf');
        Route::get('/suratMasukDetail/{id}/{userid}/destroy', [SuratMasukDetailController::class, 'destroy'])->name('admin.suratMasukDetail.destroy');

        // route Surat masuk
        Route::resource('/suratkeluar', SuratKeluarController::class, ['as' => 'admin']);

        //route Surat masuk detail file
        Route::post('/suratKeluarDetail/upload', [SuratKeluarDetailController::class, 'upload'])->name('admin.suratKeluarDetail.upload');
        Route::get('/suratKeluarDetail/{userid}/{filename}/download', [SuratKeluarDetailController::class, 'download'])->name('admin.suratKeluarDetail.download');
        Route::get('/suratKeluarDetail/{userid}/{filename}/previewPdf', [SuratKeluarDetailController::class, 'previewPdf'])->name('admin.suratKeluarDetail.previewPdf');
        Route::get('/suratKeluarDetail/{id}/{userid}/destroy', [SuratKeluarDetailController::class, 'destroy'])->name('admin.suratKeluarDetail.destroy');

        // Lock Screen
        Route::get('/lock-screen', function () {
            return view('auth.lock-screen');
        })->name('lock-screen');

        // Unlock screen
        Route::post('/unlock-screen', function (Request $request) {
            $password = $request->input('password');
        
            if ($password === 'your-password-here') { // replace with your actual password
                session(['lock-screen-unlocked' => true]);
                return redirect()->intended('/home'); // replace with your desired redirect location
            }
        
            return redirect()
                ->back()
                ->withErrors(['password' => __('The password is incorrect.')]);
        })->name('unlock-screen');

    });
});