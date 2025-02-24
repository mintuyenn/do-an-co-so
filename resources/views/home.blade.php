<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shop bán Laptop chính hãng 100%</title>
  @vite(['resources/css/home.css','resources/js/home.js'])
  
</head>
<body>
  <header class="header">
    <div class="logo">SHOP BÁN LAPTOP CHÍNH HÃNG 100%</div>
    <nav class="nav">
      <a class="nav-link home" href="">Trang chủ</a>
      <a class="nav-link" href="#">Giỏ hàng</a>
      <a class="nav-link" href="#">Tư vấn khách hàng</a>
      <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
      <a class="nav-link" href="{{ route('register') }}">Đăng kí</a>
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

    <section class="brands">
      <div class="brand">
        <img src="{{ asset('storage/images/acer.jpg') }}" alt="Acer logo">
      </div>
      <div class="brand">
        <img src="{{ asset('storage/images/lenovo.jpg') }}" alt="Lenovo logo">
      </div>
      <div class="brand">
        <img src="{{ asset('storage/images/dell.jpg') }}" alt="Dell logo">
      </div>
      <div class="brand">
        <img src="{{ asset('storage/images/hp.jpg') }}" alt="HP logo">
      </div>
    </section>
    
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
                </div>
            </div>
        @endforeach
    </div>
</div>

  </main>
</body>
</html>