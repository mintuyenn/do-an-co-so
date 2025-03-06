<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chitietdonhang'; // Tên bảng trong database

    protected $fillable = [
        'don_hang_id', 'san_pham_id', 'so_luong', 'gia'
    ];

    public $timestamps = false; // Nếu bảng không có created_at và updated_at

    // Một chi tiết đơn hàng thuộc về một đơn hàng
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id');
    }

    // Một chi tiết đơn hàng thuộc về một sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}
