<?php

namespace App\Http\Services\Size;

use App\Http\Requests\Product\SizeRequest;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SizeServices
{
    public function add($request)
    {
        try {

            Size::create($request->all());

            Session::flash('success', 'Thêm Size thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAllSize()
    {
        return DB::table('sizes')->simplePaginate(20);
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $size = Size::where('id', $id)->first();

        if($size)
        {
            return Size::where('id', $id)->delete();
        }
        return false;
    }

    public function update($size, $request)
    {
        $size->namesize = (string)$request->input('namesize');
        $size->save();

        Session::flash('success', 'Cập nhật Size thành công');
        return true;
    }
}
