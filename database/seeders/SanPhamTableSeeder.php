<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SanPham;

class SanPhamTableSeeder extends Seeder
{
    public function run(): void
    {
        $sanphams = [
            [
                'ten' => 'Laptop Dell Latitude 5300 i5 8365U Hàng xách tay USA 98%',
                'hinhanh'=> 'storage/app/public/images/dell1.jpg',
                'gia' => 6990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 13.3 inch HD (1366 x 768), WLED, 60 Hz',
                'thuonghieu' => 'Dell'
            ],
            [
                'ten' => 'Laptop Dell Latitude 3500 i5 8265U RAM 8GB SSD 256GB HD Hàng xách tay JAPAN 98%',
                'hinhanh'=> 'storage/app/public/images/dell2.jpg',
                'gia' => 6990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 15.6 inch HD (1366x768) Anti-Glare, Camera and Microphone',
                'thuonghieu' => 'Dell'
            ],
            [
                'ten' => 'Laptop Dell Latitude 5420 i5 1135G7 FHD Hàng xách tay 98%',
                'hinhanh'=> 'storage/app/public/images/dell3.jpg',
                'gia' => 11390000,
                'soluong' => 100,
                'mota' => 'Màn Hình: 14" FHD (1920x1080) Anti-Glare, 300 nits, WLAN/WWAN, HD Camera',
                'thuonghieu' => 'Dell'
            ],
            [
                'ten' => 'Laptop Dell Inspiron 14 7445 2 in 1 R5 8640HS FHD Cảm ứng lật xoay 360 độ',
                'hinhanh'=> 'storage/app/public/images/dell4.jpg',
                'gia' => 15390000,
                'soluong' => 200,
                'mota' => 'Màn hình: 14", FHD+ 1920x1200, 60Hz, WVA, IPS, Touch, 250 nit, ComfortView',
                'thuonghieu' => 'Dell'
            ],
            [
                'ten' => 'Laptop Dell Latitude 7440 i5 1345U RAM 16GB FHD Cảm ứng',
                'hinhanh'=> 'storage/app/public/images/dell5.jpg',
                'gia' => 20390000,
                'soluong' => 100,
                'mota' => 'Màn hình: 15.6 inch HD (1366x768) Anti-Glare, Camera and Microphone',
                'thuonghieu' => 'Dell'
            ],
            [
                'ten' => 'Laptop Lenovo Thinkpad T495 R7 3700U FHD',
                'hinhanh'=> 'storage/app/public/images/thinpak1.jpg',
                'gia' => 9990000,
                'soluong' => 400,
                'mota' => 'Màn Hình: 14 inch FHD IPS (1920 x 1080, 250 nit)',
                'thuonghieu' => 'Lenovo'
            ],
            [
                'ten' => 'Laptop Lenovo Thinkpad T14 Gen 1 i5 10210U RAM 16GB FHD – Hàng xách tay 99%',
                'hinhanh'=> 'storage/app/public/images/thinpak2.jpg',
                'gia' => 10990000,
                'soluong' => 300,
                'mota' => 'Màn Hình: 14" FHD IPS (1920 x 1080, 250 nits)',
                'thuonghieu' => 'Lenovo'
            ],
            [
                'ten' => 'Laptop Lenovo ThinkBook 14 G5 R7 7735H RAM 16GB M2.SSD 512GB 2.8K 90Hz',
                'hinhanh'=> 'storage/app/public/images/thinpak3.jpg',
                'gia' => 12990000,
                'soluong' => 500,
                'mota' => 'Màn hình: 14’’ 2.8K (2880x1800) Tỉ lệ 16:10, IPS, 400Nits, 100 sRGB',
                'thuonghieu' => 'Lenovo'
            ],
            [
                'ten' => 'Laptop Lenovo LOQ Gaming 15ARP9 R7 7435HS M2.SSD 512GB FHD 144Hz NVIDIA® GeForce RTX™ 4050 6GB GDDR6',
                'hinhanh'=> 'storage/app/public/images/thinpak4.jpg',
                'gia' => 20990000,
                'soluong' => 100,
                'mota' => 'Màn Hình: 15.6" FHD (1920x1080) IPS 300nits Anti-glare, 100% sRGB, 144Hz, G-SYNC®',
                'thuonghieu' => 'Lenovo'
            ],
            [
                'ten' => 'Laptop Lenovo Thinkpad T16 Gen 3 Ultra 7 165U RAM 16GB M2.SSD 1TB FHD',
                'hinhanh'=> 'storage/app/public/images/thinpak5.jpg',
                'gia' => 7990000,
                'soluong' => 200,
                'mota' => 'Màn hình: 16″ WUXGA (1920 x 1200) IPS, antiglare, low-power, 400nits 100% sRGB',
                'thuonghieu' => 'Lenovo'
            ],
            [
                'ten' => 'Laptop Acer Predator Helios Neo 16 PHN16 i9 14900HX RAM 32GB M2.SSD 1TB 2.5K NVIDIA® GeForce RTX™ 4060 8GB GDDR6',
                'hinhanh'=> 'storage/app/public/images/acer1.jpg',
                'gia' => 9800000,
                'soluong' => 100,
                'mota' => 'Màn hình: 16" WQXGA (2560 x 1600), IPS 240Hz, sRGB 100%, 500 nits',
                'thuonghieu' => 'Acer'
            ],
            [
                'ten' => 'Laptop Acer Predator Helios NEO i7 13700HX RAM 16GB M2.SSD 512GB FHD 165Hz NVIDIA Geforce RTX 4050 6GB',
                'hinhanh'=> 'storage/app/public/images/acer2.jpg',
                'gia' => 25990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 16 inch FHD (1920 x 1080) IPS 165Hz SlimBezel, sRGB 100%, Acer ComfyView, 500 nits',
                'thuonghieu' => 'Acer'
            ],

            [
                'ten' => 'Laptop Acer Predator Helios NEO i9 13900HX RAM 16GB M2.SSD 1TB 2.5K 165Hz NVIDIA Geforce RTX 4060 8GB',
                'hinhanh'=> 'storage/app/public/images/acer3.jpg',
                'gia' => 19990000,
                'soluong' => 200,
                'mota' => 'Màn hình: 16 inch WQXGA (2560 x 1600) IPS 165Hz SlimBezel, sRGB 100%, Acer ComfyView, 500 nits',
                'thuonghieu' => 'Acer'
            ],
            
    
            [
                'ten' => 'Laptop Acer Nitro 5 Tiger AN515 i7 12650H RAM 16GB M2.SSD 512GB FHD NVIDIA® GeForce® RTX 4050 6GB GDDR6',
                'hinhanh'=> 'storage/app/public/images/acer4.jpg',
                'gia' => 17990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 15.6 inchs, FHD (1920 x 1080), IPS, 165Hz, LCD',
                'thuonghieu' => 'Acer'
            ],
            
            [
                'ten' => 'Laptop Acer Nitro ANV15 i7 13620H RAM 16GB M2.SSD 512GB FHD NVIDIA® GeForce RTX™ 4060 8GB GDDR6
    ',
                'hinhanh'=> 'storage/app/public/images/acer5.jpg',
                'gia' => 16990000,
                'soluong' => 500,
                'mota' => 'Màn hình: 15.6 inch FHD (1920 x 1080) IPS 144Hz SlimBezel',
                'thuonghieu' => 'Acer'
            ],
            

            [
                'ten' => 'Laptop HP Probook 450 G5 i5 8250U RAM 8GB HD Hàng xách tay JAPAN 98%',
                'hinhanh'=> 'storage/app/public/images/hp1.jpg',
                'gia' => 5990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 39.6 cm (15.6 in) diagonal HD SVA anti-glare LED-backlit, 220 cd/m2, 45% sRGB (1366 x 768)',
                'thuonghieu' =>'HP'
            ],
        

            [
                'ten' => 'Laptop HP Elitebook 640 G10 i5 1335U RAM 16GB M2.SSD FHD',
                'hinhanh'=> 'storage/app/public/images/hp2.jpg',
                'gia' => 6890000,
                'soluong' => 200,
                'mota' => 'Màn hình: 15.6 inch HD (1366x768) Anti-Glare, Camera and Microphone',
                'thuonghieu' =>'HP'
            ],
        

            [
                'ten' => 'Laptop HP EliteBook X360 830 G8 i7 1185G7 RAM 16GB FHD Cảm ứng lật xoay 360 độ',
                'hinhanh'=> 'storage/app/public/images/hp3.jpg',
                'gia' => 8990000,
                'soluong' => 1000,
                'mota' => 'Màn hình: 33.8 cm (13.3") diagonal FHD IPS BrightView WLED-backlit bent touch screen, 250 nits, 45% NTSC with HD camera for WWAN (1920 x 1080)',
                'thuonghieu' =>'HP'
            ],
       

        
            [
                'ten' => 'Laptop HP Elitebook 845 G9 R5 6650U RAM 16GB M2.SSD 512GB FHD+ Hàng xách tay 99%',
                'hinhanh'=> 'storage/app/public/images/hp4.jpg',
                'gia' => 10990000,
                'soluong' => 100,
                'mota' => 'Màn hình: 15.6 inch HD (1366x768) Anti-Glare, Camera and Microphone',
                'thuonghieu' =>'HP'
            ],
        
            [
                'ten' => 'Laptop HP ZBook Firefly 14 G10 i7 1365U RAM 32GB FHD NVIDIA RTX™ A500 4GB GDDR6',
                'hinhanh'=> 'storage/app/public/images/hp5.jpg',
                'gia' => 9990000,
                'soluong' => 200,
                'mota' => 'Màn hình: 14" diagonal, WUXGA (1920 x 1200), IPS, anti-glare, 250 nits, 45%NTSC',
                'thuonghieu' =>'HP'
            ],

        ];

        foreach ($sanphams as $sp) {
            SanPham::updateOrCreate(['ten' => $sp['ten']], $sp);
        }
    }
}
