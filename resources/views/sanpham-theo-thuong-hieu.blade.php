
@vite(['resources/css/app.css'])
    <div class="container mx-auto my-10">
    <h1 class="text-2xl font-bold text-center mb-8 text-red-800">Các laptop có thương hiệu: {{ $thuonghieu }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($sanphams as $sanpham)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:scale-105 transition-transform">
                <img src="{{ asset(str_replace('storage/app/public/', 'storage/', $sanpham->hinhanh)) }}" 
                         alt="{{ $sanpham->ten }}" 
                         class="w-full h-48 object-cover border-b">
                    <div class="p-4">
                        <h5 class="text-lg font-bold mb-2 text-black">{{ $sanpham->ten }}</h5>
                        <p class="text-md font-bold text-gray-700 mb-2"> Giá: {{ number_format($sanpham->gia) }} VND</p>
                        <p class="text-gray-600">{{ $sanpham->mota }}</p>
                        <form action="{{ route('giohang.them') }}" method="POST">
                            @csrf
                            <input type="hidden" name="sanpham_id" value="{{ $sanpham->id }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                🛒 Thêm vào giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full flex justify-center mt-5">
    <a href="{{ url('/dashboard') }}" 
       class="w-full max-w-lg bg-gray-500 text-white text-center px-6 py-3 rounded-lg hover:bg-gray-700 transition">
       Quay lại trang chủ
    </a>
</div>

