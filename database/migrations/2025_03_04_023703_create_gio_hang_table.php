<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Liên kết với bảng users
            $table->foreignId('sanpham_id')->constrained('sanpham')->onDelete('cascade'); // Liên kết sản phẩm
            $table->integer('soluong')->default(1); // Số lượng sản phẩm
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
};
