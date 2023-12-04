<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // lấy tất cả 
        // $users = User::all();
        // lấy theo điều kiện 
        // $users = User::where('id',1)->get(); 
        // $users = User::where('email','like','%nguyen%')->get();
        $users = User::where('id',2)->first(); 
        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
