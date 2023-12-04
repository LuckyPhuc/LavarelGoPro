<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use App\Models\User;
use App\Models\Post;
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
// Route::get('post',function(){
//     return "Đây là trang bài viết.";
// });  

// Route::get('admin/product',function(){
//     return "Trang quản trị sản phẩm";
// });
// Route::get('admin/product/add',function(){
//     return "Trang thêm sản phẩm";
// });
// //Định tuyến có tham số
// // ứng dụng để làm chi tiết sản phẩm , trang bài viết,liên quan đến dữ liệu có thể thay đổi, nhiều bản ghi
// //tham số để bên trong dấu ngoặc nhọn {}
// Route::get('posts/{id}', function($id){
//     return $id;
// });
// Route::get('/posts/{cat_id}/page/{page}', function($cat_id,$page){
//     return $cat_id . '_' . $page;
// });
// // đặt tên định tuyến 
// Route::get('/users/profile', function(){
//     return route('profile');
// })-> name('profile') ;
// Route::get('admin/product/add',function(){
//     return route('product.add');
// })->name('product.add'); //name('module.hành động(action)')

// // định tuyến có tham số tùy chọn 
// //domain.com/users => danh sách users
// // Route::get('users', function(){
// //     return "đây list users";
// // });
// //domain.com/users/4 => hiển thị ra users có id = 4

// // định tuyến có tham số thông thường 
// Route::get('users/{id}', function($id = 0){
//     return $id;
// });
// // định tuyến có tham số yes no 
// Route::get('users/{id?}', function($id = "List users"){
//     return $id;
// });
// Route::get('admin/dashboard', function() {
//     return view('admin/dashboard');
// });
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

// // đã khai báo trong global provider 
// Route::get('product/{slug}/{id}', function($slug,$id){
//     return $id ."-------". $slug;
// }) -> where('slug' , '[A-Za-z0-9-_]+');

// // định tuyến tới 1 view
// // Route::view('/welcome','welcome');

// // Route::view('/post','post', ['id' => 30 ]);

// // định tuyến tới 1 controller
// Route::get('/post/{id}', [PostController::class, 'detail']);

// #Quản lí sản phẩm
// Route::get('admin/products/list',function(){
//     return view('/admin/products/product');
// });
// Route::get('admin/products/add',function(){
//     return view('/admin/products/product-add');
// });
// Route::get('admin/products/delete/{id}',function($id){
//     return view('/admin/products/product-del').'id'.$id;
// });
// Route::get('admin/products/update/id',function($id){
//     return view('/admin/products/product-update'.'id'.$id);
// });

// Route::get('post/index',function(){
//     return view('post');
// });

// Route::get('post/index',[PostController::class,'index']);
// Route::get('admin/post/show',[AdminPostController::class,'show']);

// Route::get('admin/products/list',[AdminProductController::class,'ListProduct']);
// Route::get('admin/products/create',[AdminProductController::class,'AddProduct']);
// Route::get('admin/products/delete',[AdminProductController::class,'DeleteProduct']);
// Route::get('admin/products/update',[AdminProductController::class,'UpdateProduct']);

// Route::get('child',function(){
//     $collection = array(
//         1=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18302','old'=> '23'),
//         2=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18303','old'=> '23'),
//         3=> array('name'=> 'Nguyễn Dương Hoàng Phúc','grade'=> 'Web18304','old'=> '23')
//     );
//     return view('child', compact('collection'));
// });
// Nhóm các route cho ProductController

// Nhóm các route cho ProductController
Route::prefix('admin/products')->name('admin.products.')->group(function () {
    Route::get('list', [ProductController::class, 'index'])->name('list');
    Route::get('create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('{id}', [ProductController::class, 'show'])->name('show');
    Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

// name('admin.products.') đặt một tiền tố cho tất cả các tên route bên trong nhóm. Ví dụ, route list sẽ có tên đầy đủ là admin.products.list.
// ->name('list') đặt tên cụ thể cho route đó. Bạn có thể sử dụng tên này để tạo URL hoặc redirect đến route này từ bất kỳ đâu trong ứng dụng của bạn.
// Sử dụng tên route là một phương pháp hay trong việc quản lý route, vì nó cho phép bạn thay đổi URL mà không cần phải sửa đổi những nơi trong code sử dụng URL đó. Để tạo URL đến một route đã đặt tên, bạn có thể sử dụng hàm route() với tên route làm tham số, như route('admin.products.list').
Route::prefix('admin/posts')->name('admin.posts.')->group(function () {
    // Hiển thị danh sách bài viết
    Route::get('list', [PostController::class, 'index'])->name('list');

    // Hiển thị form tạo bài viết mới
    Route::get('create', [PostController::class, 'create'])->name('create');

    // Xử lý lưu trữ bài viết mới
    Route::post('/', [PostController::class, 'store'])->name('store');

    // Hiển thị chi tiết của một bài viết cụ thể
    Route::get('{id}', [PostController::class, 'show'])->name('show');

    // Hiển thị form chỉnh sửa thông tin bài viết
    Route::get('{id}/edit', [PostController::class, 'edit'])->name('edit');

    // Xử lý cập nhật thông tin bài viết
    Route::put('{id}', [PostController::class, 'update'])->name('update');

    // Xử lý xóa bài viết
    Route::delete('{id}', [PostController::class, 'destroy'])->name('destroy');
});

// Eloquent ORM
// Route::get('post/read',function(){
//     $users = User::all();
//     return $users;
// });

Route::get('user/list', [UserController::class,'index'])->name('list');