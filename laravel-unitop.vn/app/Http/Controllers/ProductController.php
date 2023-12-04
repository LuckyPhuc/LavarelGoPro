<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Đây là trang list sản phẩm';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect() -> Route('admin.products.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  $price = 10000;
       return view('admin.products.index' ,compact('id','price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Sửa thông tin sản phẩm";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Cập nhật thông tin sản phẩm";
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return "Xoá sản phẩm có id " . $id;
    }
}
