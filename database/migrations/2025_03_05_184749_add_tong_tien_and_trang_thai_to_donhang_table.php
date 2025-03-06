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
        Schema::table('donhang', function (Blueprint $table) {
            $table->decimal('tong_tien', 15, 2)->default(0)->after('id');
            $table->string('trang_thai', 50)->default('Chờ xác nhận')->after('tong_tien');
        });
    }

    public function down()
    {
        Schema::table('donhang', function (Blueprint $table) {
            $table->dropColumn(['tong_tien', 'trang_thai']);
        });
    }
};
