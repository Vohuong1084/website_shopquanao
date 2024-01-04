<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterService {

    // Hàm thêm dữ liệu
    public function insert($request) {
        try {
            $user = DB::table('users')->pluck('email')->toArray();
            if (is_array($user) && in_array($request->input('email'), $user)) {
                $request->session()->flash('error', "Email đã tồn tại");
            }
            else {
                if ($request->input('password') === $request->input('passwordcomfirm')) {
                    User::create([
                        'name' => (string)$request->input('name'),
                        'email' => (string)$request->input('email'),
                        'hinhanh' => (string)$request->input('hinhanh'),
                        'password' => ('bcrypt')($request->input('password')),
                        'DEC' => ('USER')
                    ]);
                    $request->session()->flash('success', "Đăng ký thành công");
                    return true;
                }
                else {
                    $request->session()->flash('error', "mật khẩu không khớp với mật khẩu xác thực");
                }
            }       
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }

        return true;
    } 
}

?>