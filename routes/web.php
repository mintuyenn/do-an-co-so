<?php 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Trang chủ - Không yêu cầu đăng nhập
Route::get('/', [ProductController::class, 'index'])->name('home');

// Dashboard và sản phẩm theo thương hiệu - Yêu cầu đăng nhập và xác thực email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/thuong-hieu/{thuonghieu}', 
    [ProductController::class, 'sanPhamTheoThuongHieu']
)->name('dashboard.sanpham-theo-thuong-hieu');
});

// Profile - Yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';

