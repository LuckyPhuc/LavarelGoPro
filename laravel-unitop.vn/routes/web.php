<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;

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
Route::get('admin/dashboard', function() {
    return view('admin/dashboard');
});
// định tuyến với tham số có ràng buộc biểu thức chính quy 
// Route::get('product/{id}', function($id){
//     return $id;
// }) -> where('id', '[0-9]+');
// Route::get('product/{slug}/{id}', function($slug,$id){
//     return $id ."-------". $slug;
// }) -> where('id', '[0-9]+'); 
// Route::get('product/{slug}/{id}', function($slug,$id){
//     return $id ."-------". $slug;
// }) -> where(['id'=> '[0-9]+','slug => [A-Za-z0-9-_]+']);

// đã khai báo trong global provider 
Route::get('product/{slug}/{id}', function($slug,$id){
    return $id ."-------". $slug;
}) -> where('slug' , '[A-Za-z0-9-_]+');

// định tuyến tới 1 view
// Route::view('/welcome','welcome');

// Route::view('/post','post', ['id' => 30 ]);

// định tuyến tới 1 controller
Route::get('/post/{id}', [PostController::class, 'detail']);

#Quản lí sản phẩm
Route::get('admin/products/list',function(){
    return view('/admin/products/product');
});
Route::get('admin/products/add',function(){
    return view('/admin/products/product-add');
});
Route::get('admin/products/delete/{id}',function($id){
    return view('/admin/products/product-del').'id'.$id;
});
Route::get('admin/products/update/id',function($id){
    return view('/admin/products/product-update'.'id'.$id);
});

Route::get('post/index',function(){
    return view('post');
});

Route::get('post/index',[PostController::class,'index']);
Route::get('admin/post/show',[AdminPostController::class,'show']);

Route::get('admin/products/list',[AdminProductController::class,'ListProduct']);
Route::get('admin/products/create',[AdminProductController::class,'AddProduct']);
Route::get('admin/products/delete',[AdminProductController::class,'DeleteProduct']);
Route::get('admin/products/update',[AdminProductController::class,'UpdateProduct']);

// Route::get('child',function(){
//     $collection = array(
//         1=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18302','old'=> '23'),
//         2=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18303','old'=> '23'),
//         3=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18304','old'=> '23')
//     );
//     return view('child', compact('collection'));
// });

Route::get('child',function($data = 'Lavarel go pro'){
return $data;
});