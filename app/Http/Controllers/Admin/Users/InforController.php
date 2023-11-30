<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InforController extends Controller
{
    public function index() {
        $title = 'Thông tin cá nhân';
        return view('user.account.infor', compact('title'));
    }
}
