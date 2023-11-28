<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    function ListProduct(){
        return view('admin.products.product');
    }
    function AddProduct(){
        return view('admin.products.product-add');
    }
    function DeleteProduct(){
        return view('admin.products.product-del');
    }
    function UpdateProduct(){
        return view('admin.products.product-update');//view(tên quyền, tên module, tên chức năng)
    }
    
}
