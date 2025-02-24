<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu tên bảng không theo quy chuẩn Laravel (plural form)
    protected $table = 'sanpham'; 

    // Các trường có thể mass-assignable (được gán giá trị từ request)
    protected $fillable = [
        'ten',
        'gia',
        'mota',
        'hinhanh',
        'soluong',
        'thuonghieu',
    ];

    // Nếu bạn có timestamp, mặc định Laravel sẽ tự động cập nhật `created_at` và `updated_at`
    public $timestamps = true;

    // Các phương thức và mối quan hệ (nếu có) sẽ được thêm vào sau
}

