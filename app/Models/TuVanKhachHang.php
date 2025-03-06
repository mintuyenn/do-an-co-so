<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuVanKhachHang extends Model
{
    use HasFactory;

    protected $table = 'tu_van_khach_hang';

    protected $fillable = [
        'user_id',
        'ten_khach_hang',
        'email',
        'so_dien_thoai',
        'noi_dung',
    ];

    // Liên kết với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
