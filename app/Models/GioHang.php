<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    
    protected $table = 'gio_hang';
    
    protected $fillable = ['user_id', 'sanpham_id', 'soluong'];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
