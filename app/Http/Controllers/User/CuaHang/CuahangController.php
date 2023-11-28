<?php

namespace App\Http\Controllers\User\CuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuahangController extends Controller
{
    public function index() {
        $title = 'Cửa hàng';
        return view('user.CuaHang.CuaHang', compact('title'));
    }
}