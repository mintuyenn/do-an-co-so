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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('ten'); // Tên sản phẩm
            $table->text('mota')->nullable(); // Mô tả sản phẩm
            $table->decimal('gia', 15, 2);
            $table->integer('soluong')->default(0); // Số lượng trong kho
            $table->string('hinhanh')->nullable(); // Đường dẫn hình ảnh
            $table->timestamps(); // Thời gian tạo và cập nhật;
            $table->string('thuonghieu')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
