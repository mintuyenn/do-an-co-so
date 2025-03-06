<?php 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuVanKhachHangController;
use App\Http\Controllers\GioHangController;
use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ThanhToanController;

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


Route::get('/tu-van', [TuVanKhachHangController::class, 'index'])->name('tu-van.index');
Route::post('/tu-van', [TuVanKhachHangController::class, 'store'])->name('tu-van.store');



Route::middleware(['auth'])->group(function () {
    Route::post('/giohang/them', [GioHangController::class, 'themVaoGio'])->name('giohang.them');
    Route::get('/giohang', [GioHangController::class, 'hienThiGioHang'])->name('giohang.hienthi');
    Route::post('/giohang/capnhat/{id}', [GioHangController::class, 'capNhat'])->name('giohang.capnhat');
    Route::delete('/giohang/xoa/{id}', [GioHangController::class, 'xoa'])->name('giohang.xoa');
;

});


Route::get('/search', [SearchController::class, 'index'])->name('search');


Route::get('/thanhtoan', [ThanhToanController::class, 'index'])->name('thanhtoan'); // Hiển thị trang thanh toán
Route::post('/thanhtoan', [ThanhToanController::class, 'tienHanhThanhToan'])->name('thanhtoan.submit'); // Xử lý thanh toán

// Auth route
require __DIR__.'/auth.php';
