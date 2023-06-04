<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return view("profile");
        // $request->session()->flush();
    }
    public function user()
    {
        return view("user");
    }
}
