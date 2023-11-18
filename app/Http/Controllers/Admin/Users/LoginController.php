<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.account.login', [
            'title' => 'Đăng nhập'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            if ($user->DEC === "ADMIN") {
                return redirect()->route('admin');
            }
            else {
                return redirect()->route('user');
            }
        }
        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}
