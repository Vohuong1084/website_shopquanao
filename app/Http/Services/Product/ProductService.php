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

    public function listColor()
    {
        return DB::table('colors')->get();
    }
    
    public function listSize()
    {
        return DB::table('sizes')->get();
    }

    public function get()
    {
        return $products = DB::table('products')
        ->join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('colors', 'colors.id', '=', 'products.color_id')
        ->join('sizes', 'sizes.id', '=', 'products.size_id')
        ->select('products.*', 'menus.name', 'colors.namecolor', 'sizes.namesize')
        ->simplePaginate(10);
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
    public function update($request, $id)
    {
        $file = $request->file('hinhanh'); // Lấy file

        if ($file) { // Nếu file tồn tại thì chạy cái này
            
            try {
                DB::table('products')->where('id', '=', $id)->update([
                    'nameproduct' => $request->input('nameproduct'),
                    'content' => $request->input('content'),
                    'menu_id' => $request->input('menu_id'),
                    'price' => $request->input('price'),
                    'hinhanhproduct' => $request->input('hinhanh'),
                    'soluong' => $request->input('soluong'),
                    'color' => $request->input('color'),
                    'size' => $request->input('size')
                ]);
    
                Session::flash('success', 'Cập nhật thành công Sản Phẩm');
            } catch (\Throwable $th) {
                return false;
            }

            return true;
        }
        else { // Nếu file không tồn tại thì chạy cái này
            try {
                DB::table('products')->where('id', '=', $id)->update([
                    'nameproduct' => $request->input('nameproduct'),
                    'content' => $request->input('content'),
                    'menu_id' => $request->input('menu_id'),
                    'price' => $request->input('price'),
                    'soluong' => $request->input('soluong'),
                    'color' => $request->input('color'),
                    'size' => $request->input('size')
                ]);
    
                Session::flash('success', 'Cập nhật thành công Sản Phẩm');
            } catch (\Throwable $th) {
                return false;
            }

            return true;
        }
    }
}
