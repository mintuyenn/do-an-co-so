<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Không tự động tạo 10 User
        // User::factory(10)->create();

        // Không tạo User mẫu
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Không gọi Seeder cho bảng san_pham
        // $this->call(SanPhamTableSeeder::class);
    }
}
