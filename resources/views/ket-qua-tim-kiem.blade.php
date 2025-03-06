
@vite(['resources/css/app.css'])

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
        Kết quả tìm kiếm của bạn
    </h2>

    @if ($products->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
    @foreach ($products as $product)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="relative">
                @if (!empty($product->hinhanh)) 
                    <img src="{{ asset(str_replace('storage/app/public/', 'storage/', $product->hinhanh)) }}" 
                        alt="{{ $product->ten }}" 
                        class="w-full h-56 object-cover">
                @else
                    <img src="{{ asset('images/default.png') }}" 
                        alt="Ảnh mặc định" 
                        class="w-full h-56 object-cover">
                @endif
                <div class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded">
                    Mới
                </div>
            </div>

            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $product->ten }}</h3>
                <p class="text-gray-600 text-sm mt-1 line-clamp-2">
                    {{ Str::limit($product->mota, 100) }}
                </p>
                <p class="text-red-600 font-bold text-xl mt-2">
                    {{ number_format($product->gia, 0, ',', '.') }} VND
                </p>

                <div class="mt-4 flex justify-between">
            
                <form action="{{ route('giohang.them') }}" method="POST">
            @csrf
            <input type="hidden" name="sanpham_id" value="{{ $product->id }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                🛒 Thêm vào giỏ hàng
            </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

    @else
        <p class="text-gray-600 text-lg">Không tìm thấy sản phẩm nào phù hợp.</p>
    @endif
</div>

<div class="w-full flex justify-center mt-5">
    <a href="{{ url('/dashboard') }}" 
       class="w-full max-w-lg bg-gray-500 text-white text-center px-6 py-3 rounded-lg hover:bg-gray-700 transition">
       Quay lại trang chủ
    </a>
</div>
