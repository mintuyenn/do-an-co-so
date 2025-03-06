<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TuVanKhachHang;
use Illuminate\Support\Facades\Auth;


class TuVanKhachHangController extends Controller
{
    public function index()
    {
        return view('tu-van.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_khach_hang' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'so_dien_thoai' => 'required|string|max:20',
            'noi_dung' => 'required|string',
        ]);

        TuVanKhachHang::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'ten_khach_hang' => $request->ten_khach_hang,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'noi_dung' => $request->noi_dung,
        ]);

        return redirect()->back()->with('success', 'Gửi tư vấn thành công!');
    }
}

