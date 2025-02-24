
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>

