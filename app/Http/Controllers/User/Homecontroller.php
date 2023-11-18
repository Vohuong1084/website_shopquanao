<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index() {
        $title = "Trang chủ";
        return view('user.home', compact('title'));
    }
}
