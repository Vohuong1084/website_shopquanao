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
        return Product::with('menu')->orderByDesc('id')->paginate(10);
    }

    public function getProductId($id)
    {
        return Product::where('id', $id)->first();
    }

    public function destroy($request)
    {
        $id =  (int)$request->input('id');
        $product = Product::where('id', $id)->first();
        if($product){
            return Product::where('id', $id)->delete();
        }
        return false;
    }
    public function update($request, $product)
    {
        $product->nameproduct = (string) $request->input('nameproduct');
        $product->hinhanhproduct = (string) $request->input('hinhanhproduct');
        $product->content = (string) $request->input('content');
        $product->price = (float) $request->input('price');
        $product->color = (string) $request->input('color');
        $product->menu_id = (int) $request->input('menu_id');
        $product->soluong = (int) $request->input('soluong');
        $product->size = (string) $request->input('size');
        $product->save();

        Session::flash('success', 'Cập nhật thành công Sản Phẩm');
        return true;
    }
}
