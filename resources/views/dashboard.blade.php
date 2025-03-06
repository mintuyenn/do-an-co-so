
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shop bán Laptop chính hãng 100%</title>
  @vite(['resources/css/home.css', 'resources/css/app.css','resources/js/home.js'])
  

</head>
<body>
  <header class="header">
    <div class="logo">SHOP BÁN LAPTOP CHÍNH HÃNG 100%</div>
    <form action="{{ route('search') }}" method="GET" class="flex items-center bg-white text-black rounded-lg overflow-hidden">
        <input type="text" name="query" placeholder="Tìm kiếm sản phẩm..." 
               class="px-3 py-2 w-64 outline-none" required>
               <button type="submit" class="px-4 py-2 text-white bg-gray-800 hover:bg-gray-900 transition-colors duration-200 rounded">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M21 21l-4.35-4.35M9 17A8 8 0 109 1a8 8 0 000 16z"/>
                  </svg>
                </button>
    </form>

    <nav class="nav">
      <a class="nav-link home" href="{{ route('home') }}">Trang chủ</a>
      <a href="{{ route('giohang.hienthi') }}" class="text-white hover:underline">🛒</a>
      <a href="{{ route('tu-van.index') }}" class="text-white hover:underline">Tư vấn khách hàng</a>

      @auth
        <a class="nav-link" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a> <!-- Thêm liên kết tới trang hồ sơ người dùng -->
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>

  <!-- Form logout -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
      @csrf
  </form>
@else
  <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
  <a class="nav-link" href="{{ route('register') }}">Đăng kí</a>
@endauth

    </nav>
  </header>

  <main class="main-content">
    <section class="hero">
      <div class="slider">
        <div class="slides">
          <img src="{{ asset('storage/images/anhnen.jpg') }}" alt="Laptop on green grass">
          <img src="{{ asset('storage/images/anhnen1.jpg') }}" alt="Laptop on green grass">
          <img src="{{ asset('storage/images/anhnen2.jpg') }}" alt="Laptop on green grass">
          <img src="{{ asset('storage/images/anhnen3.jpg') }}" alt="Laptop on green grass">
        </div>
      </div>
    </section>

    <section class="brands flex justify-center space-x-8 my-10">
    <div class="brand">
        <a href="{{ route('dashboard.sanpham-theo-thuong-hieu', ['thuonghieu' => 'Acer']) }}">
            <img src="{{ asset('storage/images/acer.jpg') }}" alt="Acer logo" class="w-32 h-32 object-contain hover:opacity-80 transition">
        </a>
    </div>
    <div class="brand">
        <a href="{{ route('dashboard.sanpham-theo-thuong-hieu', ['thuonghieu' => 'Lenovo']) }}">
            <img src="{{ asset('storage/images/lenovo.jpg') }}" alt="Lenovo logo" class="w-32 h-32 object-contain hover:opacity-80 transition">
        </a>
    </div>
    <div class="brand">
        <a href="{{ route('dashboard.sanpham-theo-thuong-hieu', ['thuonghieu' => 'Dell']) }}">
            <img src="{{ asset('storage/images/dell.jpg') }}" alt="Dell logo" class="w-32 h-32 object-contain hover:opacity-80 transition">
        </a>
    </div>
    <div class="brand">
        <a href="{{ route('dashboard.sanpham-theo-thuong-hieu', ['thuonghieu' => 'HP']) }}">
            <img src="{{ asset('storage/images/hp.jpg') }}" alt="HP logo" class="w-32 h-32 object-contain hover:opacity-80 transition">
        </a>
    </div>
</section>

  </main>


  <div class="container mx-auto my-10 px-4">
    <h1 class="text-3xl font-bold text-center mb-8">DANH SÁCH CÁC SẢN PHẨM NỔI BẬT</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($sanphams as $sanpham)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:scale-105 transition-transform">
                <img src="{{ asset(str_replace('storage/app/public/', 'storage/', $sanpham->hinhanh)) }}" 
                     alt="{{ $sanpham->ten }}" 
                     class="w-full h-48 object-cover border-b">
                <div class="p-3">
                    <h5 class="text-base font-bold mb-2 text-black">{{ $sanpham->ten }}</h5>
                    <p class="text-sm font-bold text-gray-700 mb-2">Giá: {{ number_format($sanpham->gia) }} VND</p>
                    <p class="text-xs text-gray-600">{{ $sanpham->mota }}</p>
                            
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

</div>

</body>
</html>

