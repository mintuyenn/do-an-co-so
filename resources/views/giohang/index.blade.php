

<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/css/app.css', 'resources/js/giohang.js'])

<div class="container mx-auto my-10 px-4">
    <h1 class="text-center text-3xl font-bold mb-8">Giỏ Hàng Của Bạn</h1>

    @if(session('success'))
        <div class="p-3 mb-3 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($giohang->isEmpty())
    <p class="text-center text-gray-500">Giỏ hàng trống.</p>
    <div class="w-full flex justify-center mt-5">
        <a href="{{ url('/dashboard') }}" 
        class="w-1/2 max-w-sm bg-gray-500 text-white text-center px-6 py-3 rounded-lg hover:bg-gray-700 transition">
        Tiếp tục mua sắm
        </a>
    </div>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Hình Ảnh</th>
                    <th class="border p-2">Tên Sản Phẩm</th>
                    <th class="border p-2">Số Lượng</th>
                    <th class="border p-2">Giá</th>
                    <th class="border p-2">Tổng</th>
                    <th class="border p-2">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $tongThanhTien = 0;
                @endphp

                @foreach($giohang as $item)
                @php
                    $tongTien = $item->soluong * $item->sanpham->gia;
                    $tongThanhTien += $tongTien;
                @endphp

                <tr data-id="{{ $item->id }}">
                    <td class="border p-2">
                        <img src="{{ asset(str_replace('storage/app/public/', 'storage/', $item->sanpham->hinhanh)) }}" 
                             alt="{{ $item->sanpham->ten }}" class="w-16 h-16">
                    </td>
                    <td class="border p-2">{{ $item->sanpham->ten }}</td>
                    <td class="border p-2 text-center">
                        <button class="decrease-qty bg-gray-300 px-2 py-1 rounded">-</button>
                        <input type="text" class="quantity w-12 text-center border border-gray-300" 
                               value="{{ $item->soluong }}" data-id="{{ $item->id }}" data-price="{{ $item->sanpham->gia }}" readonly>
                        <button class="increase-qty bg-gray-300 px-2 py-1 rounded">+</button>
                    </td>
                    <td class="border p-2">{{ number_format($item->sanpham->gia) }} VND</td>
                    <td class="border p-2 total-price">{{ number_format($tongTien) }} VND</td>
                    <td class="border p-2">
                        <form action="{{ route('giohang.xoa', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-black px-3 py-1 rounded hover:bg-red-700">
                                ❌ Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-5">
            <p class="text-xl font-bold">Tổng Thành Tiền: <span id="grand-total">{{ number_format($tongThanhTien) }} VND</span></p>
        </div>

        <div class="w-full flex flex-col items-center mt-5 space-y-4">
    <!-- Nút Thanh toán (Màu đỏ) -->
    <a href="{{ url('/thanhtoan') }}" 
       class="w-1/2 max-w-sm bg-red-500 text-white text-center px-6 py-3 rounded-lg hover:bg-red-700 transition">
        Thanh toán
    </a>

    <!-- Nút Tiếp tục mua sắm (Màu xám) -->
    <a href="{{ url('/dashboard') }}" 
       class="w-1/2 max-w-sm bg-gray-500 text-white text-center px-6 py-3 rounded-lg hover:bg-gray-700 transition">
        Tiếp tục mua sắm
    </a>
</div>

    @endif
</div>
