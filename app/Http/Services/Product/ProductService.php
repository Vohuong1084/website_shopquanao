<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductService
{
    
    // thêm sản phẩm
    public function addProduct($request) 
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

    // Liệt kê danh mục
    public function listMenu() 
    {
        return DB::table('menus')->get();
    }
    
    public function get()
    {
        return Product::with('menu')
                ->orderByDesc('id')->paginate(10);
    }
    public function destroy($request)
    {
        $id =  (int)$request->input('id');
        $menu = Product::where('id', $id)->first();
        if($menu){
            return Product::where('id', $id)->delete();
        }
        return false;
    }
    // public function update($request, $menu)
    // {
    //     $menu->name = (string) $request->input('name');
    //     $menu->hinhanh = (string) $request->input('hinhanh');
    //     $menu->save();

    //     Session::flash('success', 'Cập nhật thành công Danh Mục');
    //     return true;
    // }
}
