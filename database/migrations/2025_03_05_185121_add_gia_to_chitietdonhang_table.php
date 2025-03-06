<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->decimal('gia', 15, 2)->after('sanpham_id'); // Thêm trường `gia` sau `sanpham_id`
        });
    }

    public function down()
    {
        Schema::table('chitietdonhang', function (Blueprint $table) {
            $table->dropColumn('gia'); // Xóa trường `gia` nếu rollback
        });
    }
};
