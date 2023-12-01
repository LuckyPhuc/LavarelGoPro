<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function add(){
        DB::table("post")->insert(
            ['title' => 'Post 4', 'content' => 'Content4']
        );
    }
    function show(){
        //lấy dữ liệu 
        // $posts = DB::table('post')->where('id',2)->first();
        // foreach($posts as $post){
        //     echo $post -> title;
        //     echo $post -> content;
        //     echo '<br>';
        // }
        $posts = DB::table('post')->find(2);
        print_r($posts)  ;
        // return $posts;
    }
}