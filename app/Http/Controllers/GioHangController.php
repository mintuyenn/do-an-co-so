<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    public function themVaoGio(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng.');
        }

        $user = Auth::user();
        $sanpham_id = $request->sanpham_id;

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $giohang = GioHang::where('user_id', $user->id)->where('sanpham_id', $sanpham_id)->first();

        if ($giohang) {
            // Nếu đã có, tăng số lượng
            $giohang->soluong += 1;
            $giohang->save();
        } else {
            // Nếu chưa có, tạo mới
            GioHang::create([
                'user_id' => $user->id,
                'sanpham_id' => $sanpham_id,
                'soluong' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function hienThiGioHang()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $giohang = GioHang::where('user_id', Auth::id())->with('sanpham')->get();

        return view('giohang.index', compact('giohang'));
    }

    public function capNhat(Request $request, $id)
    {
        $gioHang = GioHang::find($id);
        if ($gioHang) {
            $gioHang->soluong = $request->soluong;
            $gioHang->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    
    public function xoa($id)
    {
        $gioHang = GioHang::find($id);
        if ($gioHang) {
            $gioHang->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


    
}

