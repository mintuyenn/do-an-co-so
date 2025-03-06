
@vite(['resources/css/app.css'])
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center text-red-700 mb-4">Tư vấn khách hàng</h2>

    @if(session('success'))
        <div class="p-3 mb-3 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tu-van.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Họ và Tên:</label>
            <input type="text" name="ten_khach_hang" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Số điện thoại:</label>
            <input type="text" name="so_dien_thoai" class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nội dung tư vấn:</label>
            <textarea name="noi_dung" class="w-full p-2 border border-gray-300 rounded" rows="4" required></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">
            Gửi tư vấn
        </button>

        <a href="{{ url('/dashboard') }}" class="block text-center mt-3 w-full bg-gray-500 text-white p-2 rounded hover:bg-gray-700">
            Quay lại trang chủ
        </a>
        
    </form>
</div>

