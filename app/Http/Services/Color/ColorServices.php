<?php

namespace App\Http\Services\Color;

use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ColorServices
{
    public function add($request)
    {
        try {

            Color::create($request->all());

            Session::flash('success', 'Thêm Màu thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    // Lấy tất cả màu
    public function getAllColor()
    {
        return DB::table('colors')->simplepaginate(20);
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $color = Color::where('id', $id)->first();

        if($color)
        {
            return Color::where('id', $id)->delete();
        }
        return false;
    }

    public function update($color, $request)
    {
        $color->namecolor = (string)$request->input('namecolor');
        $color->save();

        Session::flash('success', 'Cập nhật Màu thành công');
        return true;
    }
}
