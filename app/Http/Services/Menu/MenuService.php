<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function create($request)
    {
        try {

            Menu::create($request->all()); 

            Session::flash('success', 'Tạo Danh Mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function listAllMenu(){
        return DB::table('menus')->simplePaginate(10);
    }
}