<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductService
{
    
    public function create($request)
    {
        try {

            Product::create($request->all());

            Session::flash('success', 'Tạo Sản Phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // public function listAllMenu(){
    //     return DB::table('menus')->simplePaginate(10);
    // }
    // public function destroy($request)
    // {
    //     $id =  (int)$request->input('id');
    //     $menu = Menu::where('id', $id)->first();
    //     if($menu){
    //         return Menu::where('id', $id)->delete();
    //     }
    //     return false;
    // }
    // public function update($request, $menu)
    // {
    //     $menu->name = (string) $request->input('name');
    //     $menu->hinhanh = (string) $request->input('hinhanh');
    //     $menu->save();

    //     Session::flash('success', 'Cập nhật thành công Danh Mục');
    //     return true;
    // }
}
