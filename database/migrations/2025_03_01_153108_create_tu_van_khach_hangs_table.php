<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tu_van_khach_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Liên kết với users
            $table->string('ten_khach_hang', 100);
            $table->string('email', 100);
            $table->string('so_dien_thoai', 20);
            $table->text('noi_dung');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tu_van_khach_hang');
    }
};

