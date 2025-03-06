<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
{

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tìm kiếm sản phẩm.');
    }

    $query = $request->input('query');

    // Tìm kiếm sản phẩm theo tên hoặc mô tả có chứa từ khóa nhập vào
    $products = SanPham::where('ten', 'LIKE', "%$query%")
        ->orWhere('mota', 'LIKE', "%$query%")
        ->get(); // Đảm bảo lấy dữ liệu dưới dạng Collection

    return view('ket-qua-tim-kiem', compact('products', 'query'));
}
}
