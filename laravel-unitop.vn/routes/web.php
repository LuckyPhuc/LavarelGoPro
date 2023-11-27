<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Các định tuyến cơ bản
// domain.vn/post
Route::get('post',function(){
    return "Đây là trang bài viết.";
});  

Route::get('admin/product',function(){
    return "Trang quản trị sản phẩm";
});
Route::get('admin/product/add',function(){
    return "Trang thêm sản phẩm";
});
//Định tuyến có tham số
// ứng dụng để làm chi tiết sản phẩm , trang bài viết,liên quan đến dữ liệu có thể thay đổi, nhiều bản ghi
//tham số để bên trong dấu ngoặc nhọn {}
Route::get('posts/{id}', function($id){
    return $id;
});
Route::get('/posts/{cat_id}/page/{page}', function($cat_id,$page){
    return $cat_id . '_' . $page;
});
// đặt tên định tuyến 
Route::get('/users/profile', function(){
    return route('profile');
})-> name('profile') ;
Route::get('admin/product/add',function(){
    return route('product.add');
})->name('product.add'); //name('module.hành động(action)')

// định tuyến có tham số tùy chọn 
//domain.com/users => danh sách users
// Route::get('users', function(){
//     return "đây list users";
// });
//domain.com/users/4 => hiển thị ra users có id = 4

// định tuyến có tham số thông thường 
Route::get('users/{id}', function($id = 0){
    return $id;
});
// định tuyến có tham số yes no 
Route::get('users/{id?}', function($id = "List users"){
    return $id;
});
