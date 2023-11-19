<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        $title = "Đăng kí";
        return view('user.account.register', compact('title'));
    }

    
}
