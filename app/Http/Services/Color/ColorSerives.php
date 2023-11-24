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
}
