<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donhang_id')->constrained('donhang')->onDelete('cascade'); // Khóa ngoại đến bảng donhang
            $table->foreignId('sanpham_id')->constrained('sanpham')->onDelete('cascade'); // Khóa ngoại đến bảng sanpham
            $table->integer('soluong'); // Số lượng sản phẩm
            $table->decimal('gia', 15, 2)->change();
            $table->timestamps(); // Thời gian tạo và cập nhật
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietdonhang');
    }
};
