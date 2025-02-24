<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả sản phẩm từ bảng 'sanpham'
        $sanphams = SanPham::all();

        // Trả về view của dashboard và truyền dữ liệu sản phẩm sang
        return view('dashboard', compact('sanphams'));
        return view('home', compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    } 
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function sanPhamTheoThuongHieu($thuonghieu)
    {
        $thuonghieu = trim($thuonghieu);
        

        $sanphams = SanPham::whereRaw('LOWER(thuonghieu) = ?', [strtolower($thuonghieu)])->get();
        return view('sanpham-theo-thuong-hieu', compact('sanphams', 'thuonghieu'));
    }




}
