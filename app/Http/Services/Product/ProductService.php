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

    public function get($request)
    {
        $query = DB::table('products')
        ->join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('colors', 'colors.id', '=', 'products.color_id')
        ->join('sizes', 'sizes.id', '=', 'products.size_id')
        ->select('products.*', 'menus.name', 'colors.namecolor', 'sizes.namesize')
        ->where('products.nameproduct', 'like', '%'.$request->search.'%');
        if ($request->input('namecolor')) {
            $query->where('colors.namecolor', $request->input('namecolor'));
        }
        if ($request->input('namesize')) {
            $query->where('sizes.namesize', $request->input('namesize'));
        }
        if ($request->input('price')) {
            $price = $request->input('price');
            switch ($price) {
                case '1':
                    $query->where('price', '<', 200000);
                    break;
                case '2':
                    $query->whereBetween('price', [200000, 300000]);
                    break;
                case '3':
                    $query->whereBetween('price', [300000, 400000]);
                    break;
                case '4':
                    $query->whereBetween('price', [400000, 500000]);
                    break;
                case '5':
                    $query->whereBetween('price', [500000, 600000]);
                    break;
                case 'asc':
                    $query->orderBy('price', $request->input('price'));
                    break;
                case 'desc':
                    $query->orderBy('price', $request->input('price'));
                    break;
            }
        }
        $results = $query
        ->orderByDesc('id')
        ->paginate(9);

        // Để bảo quản các tham số truy vấn trong link phân trang, bạn có thể sử dụng câu lệnh sau:
        $results->appends($request->query());

        return $results;
    }

    public function getProduct()
    {
        return DB::table('products')->select('id', 'nameproduct', 'hinhanhproduct', 'price')
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    
    public function getProductId($id)
    {
        return Product::join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('colors', 'colors.id', '=', 'products.color_id')
        ->join('sizes', 'sizes.id', '=', 'products.size_id')->where('products.id', $id)
        ->select('products.*', 'menus.name', 'colors.namecolor', 'sizes.namesize')
        ->firstOrFail();
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
                    'color_id' => $request->input('color_id'),
                    'size_id' => $request->input('size_id')
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
                    'color_id' => $request->input('color_id'),
                    'size_id' => $request->input('size_id')
                ]);
    
                Session::flash('success', 'Cập nhật thành công Sản Phẩm');
            } catch (\Throwable $th) {
                return false;
            }

            return true;
        }
    }
    
    // Liệt kê sản phẩm theo danh mục
    public function getByMenu($menus, $request) {
        $query = DB::table('products')->join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('colors', 'colors.id', '=', 'products.color_id')
        ->join('sizes', 'sizes.id', '=', 'products.size_id')->where('menu_id', $menus->id)
        ->select('products.*', 'menus.name', 'colors.namecolor', 'sizes.namesize')
        ->where('products.nameproduct', 'like', '%'.$request->search.'%');
        if ($request->input('namecolor')) {
            $query->where('colors.namecolor', $request->input('namecolor'));
        }
        if ($request->input('namesize')) {
            $query->where('sizes.namesize', $request->input('namesize'));
        }
        if ($request->input('price')) {
            $price = $request->input('price');
            switch ($price) {
                case '1':
                    $query->where('price', [100000, 200000]);
                    break;
                case '2':
                    $query->whereBetween('price', [200000, 300000]);
                    break;
                case '3':
                    $query->whereBetween('price', [300000, 400000]);
                    break;
                case '4':
                    $query->whereBetween('price', [400000, 500000]);
                    break;
                case '5':
                    $query->whereBetween('price', [500000, 600000]);
                    break;
                case 'asc':
                    $query->orderBy('price', $request->input('price'));
                    break;
                case 'desc':
                    $query->orderBy('price', $request->input('price'));
                    break;
            }
        }
        $results = $query
        ->orderByDesc('id')
        ->paginate(9);

    // Để bảo quản các tham số truy vấn trong link phân trang, bạn có thể sử dụng câu lệnh sau:
    $results->appends($request->query());

    return $results;
    }

    // Liệt kê sản phẩm theo danh mục trong trang chi tiết sản phẩm
    public function getProductMenu($product) {
        return DB::table('products')->where('menu_id', '=', $product->menu_id)->get();
    }

    // Phân loại size
    public function size($request) {
        dd($request->input('namesize'));
        return DB::table('products')
        ->join('menus', 'menus.id', '=', 'products.menu_id')
        ->join('colors', 'colors.id', '=', 'products.color_id')
        ->join('sizes', 'sizes.id', '=', 'products.size_id')
        ->where('sizes.namesize', $request->input('namesize'))
        ->select('products.*', 'menus.name', 'colors.namecolor', 'sizes.namesize');
    }
}