
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KadisController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\StatistikController;

// ===============================Index================================
Route::get('/', function () {
    return view('index');
})->name('home');

// ===============================Form Checkin================================
Route::get('/form-checkin', [CheckinController::class, 'formCheckin'])
    ->name('form-checkin');

Route::post('/form-checkin', [CheckinController::class, 'store'])
    ->name('checkin.store');

// ===============================Form Checkout================================
// FORM CHECKOUT (PUBLIK)
Route::get('/form-checkout', [CheckoutController::class, 'formCheckout'])
    ->name('form-checkout');

Route::post('/form-checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

// ===============================Form Booking================================
// FORM CHECKOUT (PUBLIK)
Route::get('/form-pemesanan', [PemesananController::class, 'formCheckout'])
    ->name('form-pemesanan');

Route::post('/form-pemesanan', [PemesananController::class, 'store'])
    ->name('pemesanan.store');


// ================= KEAMANAN (WAJIB LOGIN) =================
Route::middleware('cekLogin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');

});

// login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Keamanan






// hanya bisa diakses kalau login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


// ===============================Checkin================================
Route::get('/checkin', [CheckinController::class, 'index'])
    // ->middleware('cekLogin')
    ->name('checkin');

Route::put('/checkin/{id}/approve', [CheckinController::class, 'approve'])
    ->name('checkin.approve');

Route::put('/checkin/{id}/reject', [CheckinController::class, 'reject'])
    ->name('checkin.reject');



// ===============================Statistik================================
Route::get('/statistik', [StatistikController::class, 'index'])
    // ->middleware('cekLogin')
    ->name('index');

Route::get('/statistik/export/pdf', [StatistikController::class, 'exportPdf'])
    ->name('statistik.export.pdf');

// ===============================Checkout================================
Route::get('/checkout', [CheckoutController::class, 'index'])
    // ->middleware('cekLogin')
    ->name('checkout');
Route::get('/checkout/export/pdf', [CheckoutController::class, 'exportPdf'])
    ->name('checkout.export.pdf');

// ===============================Profile================================
 Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    // upload avatar
    Route::post('/profile/upload', [ProfileController::class, 'uploadAvatar'])
        ->name('profile.upload');

    // 🔐 ganti password
    Route::post('/profile/password', [AuthController::class, 'updatePassword'])
        ->name('profile.password');

// ==============================Pemesanan===============================
Route::get('/pemesanan', [PemesananController::class, 'index'])
    // ->middleware('cekLogin')
    ->name('pemesanan.index');
Route::get('/pemesanan/{id}', [PemesananController::class, 'show'])
    ->name('pemesanan.show');
Route::put('/pemesanan/{id}/approve', [PemesananController::class, 'approve'])
    ->name('pemesanan.approve');
Route::put('/pemesanan/{id}/reject', [PemesananController::class, 'reject'])
    ->name('pemesanan.reject');


// ===============================Profile Edit================================
// INI PERBAIKI AJA 

// Route::get('/profile', [AuthController::class, 'profile'])
//     ->name('profile');

// Route::get('/profile/edit', [AuthController::class, 'editProfile'])
//     ->name('profile.edit');

// Route::post('/profile/update', [AuthController::class, 'updateProfile'])
//     ->name('profile.update');


// ==============================Kepala Dinas===============================
Route::get('/kepala-dinas', [KadisController::class, 'index'])
    // ->middleware('cekLogin')
    ->name('kepala-dinas');


Route::get('/api/chart-tren-kunjungan', [ChartController::class, 'GrafikTrenKunjungan']);
Route::get('/chart-agenda-mingguan', [ChartController::class, 'chartAgendaMingguan']);