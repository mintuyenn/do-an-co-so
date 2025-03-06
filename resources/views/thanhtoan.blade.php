@vite(['resources/css/app.css'])

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Vui lòng kiểm tra thông tin trước khi thanh toán</h2>

    <!-- Hiển thị sản phẩm trong giỏ hàng -->
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-700">Sản phẩm trong giỏ hàng:</h3>
        <div class="border rounded-lg p-4">
            @php
                $tongThanhTien = 0;
            @endphp

            @foreach ($gioHang as $item)
                @php
                    $tongTienSanPham = $item->soluong * $item->sanpham->gia;
                    $tongThanhTien += $tongTienSanPham;
                @endphp

                <div class="flex justify-between items-center border-b py-3">
                    <div class="flex items-center">
                        <img src="{{ asset(str_replace('storage/app/public/', 'storage/', $item->sanpham->hinhanh)) }}" 
                             alt="{{ $item->sanpham->ten }}" class="w-16 h-16 object-cover rounded-md">
                        <div class="ml-4">
                            <p class="font-semibold">{{ $item->sanpham->ten }}</p>
                            <p class="text-gray-600">Số lượng: {{ $item->soluong }}</p>
                            <p class="text-red-500 font-semibold">
                                {{ number_format($tongTienSanPham, 0, ',', '.') }} VND
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Hiển thị tổng thành tiền -->
    <div class="text-right mb-6">
        <h3 class="text-xl font-bold text-gray-800">Tổng Thành Tiền: 
            <span class="text-red-500">{{ number_format($tongThanhTien, 0, ',', '.') }} VND</span>
        </h3>
    </div>

    <form action="{{ route('thanhtoan.submit') }}" method="POST">
    @csrf
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Thông tin khách hàng:</h3>

    <div class="mb-4">
        <label class="block text-gray-700">Họ và tên</label>
        <input type="text" name="hovaten" value="{{ auth()->user()->name }}" class="w-full p-2 border rounded-md" readonly>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full p-2 border rounded-md" readonly>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Số điện thoại</label>
        <input type="text" name="sodienthoai" value="{{ auth()->user()->sodienthoai }}" class="w-full p-2 border rounded-md" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Địa chỉ</label>
        <input type="text" name="diachi" value="{{ auth()->user()->diachi }}" class="w-full p-2 border rounded-md" required>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Xác nhận thanh toán</button>
</form>


</div>
