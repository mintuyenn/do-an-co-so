<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GioHang; // Model giỏ hàng
use App\Models\DonHang;
use App\Models\ChiTietDonHang;


class ThanhToanController extends Controller
{
    public function index()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán.');
        }

        // Lấy thông tin người dùng đăng nhập
        $user = Auth::user();

        // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
        $gioHang = GioHang::where('user_id', $user->id)->get();

        return view('thanhtoan', compact('user', 'gioHang'));

    
    }

    
    public function tienHanhThanhToan(Request $request)
    {
        $user = Auth::user();

        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán.');
        }

        // Kiểm tra nếu giỏ hàng rỗng
        if (!session()->has('gioHang') || empty(session('gioHang'))) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Cập nhật số điện thoại & địa chỉ nếu có
        if ($request->has(['sodienthoai', 'diachi'])) {
            $user->sodienthoai = $request->sodienthoai;
            $user->diachi = $request->diachi;
        
            dd($user); // Kiểm tra dữ liệu trước khi lưu
            $user->save();
        }
        

        // Tạo đơn hàng mới
        $donHang = DonHang::create([
            'user_id' => $user->id,
            'tong_tien' => $this->tinhTongTien(),
            'trang_thai' => 'Chờ xác nhận',
        ]);

        // Lưu chi tiết đơn hàng
        foreach (session('gioHang', []) as $item) {
            ChiTietDonHang::create([
                'don_hang_id' => $donHang->id,
                'san_pham_id' => $item['id'],
                'so_luong' => $item['soluong'],
                'gia' => $item['gia'],
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        session()->forget('gioHang');

        return redirect()->route('trangchu')->with('success', 'Đơn hàng đã được đặt thành công!');
    }

    private function tinhTongTien()
    {
        $tongTien = 0;
        foreach (session('gioHang', []) as $item) {
            $tongTien += $item['gia'] * $item['soluong'];
        }
        return $tongTien;
    }
}
