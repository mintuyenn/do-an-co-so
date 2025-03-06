<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'donhang'; // Đảm bảo tên bảng đúng

    protected $fillable = [
        'user_id', 'tong_tien', 'trang_thai'
    ];

    public $timestamps = false; // Nếu bảng không có created_at, updated_at

    // Một đơn hàng có nhiều chi tiết đơn hàng
    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id'); // Đảm bảo đúng tên khóa ngoại
    }
}
