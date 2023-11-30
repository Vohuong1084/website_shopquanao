<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class UpdateinforService {

    public function listUserByid($id) {
        return DB::table('users')->where('id', '=', $id)->get();
    }

    public function update($request, $id) {
        try {
            if (empty($request->input('password')) && empty($request->input('passwordcomfirm'))) {
                DB::table('users')->where('id', '=', $id)->update([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                ]);
                $request->session()->flash('success', "Cập nhật thành công");
                return true;
            }
            else if ($request->input('password') === $request->input('passwordcomfirm')) {
                DB::table('users')->where('id', '=', $id)->update([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                    'password' => ('bcrypt')($request->input('password'))
                ]);
                $request->session()->flash('success', "Cập nhật thành công");
                return true;
            }
            else {
                $request->session()->flash('error', "Không khớp mật khẩu");
            }
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }
    }
}

?>