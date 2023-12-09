<?php

namespace App\Http\Services\Cart;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class CartServices
{
    public function create($request)
    {
        $product_id = (int)$request->input('product_id');
        $quantity = (int)$request->input('num_product');

        if ($quantity <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không hợp lệ');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $quantity
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $quantity;
            Session::put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $quantity;
        Session::put('carts', $carts);
        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        $product_id = array_keys($carts);
        return Product::select('id', 'nameproduct', 'soluong', 'price', 'hinhanhproduct')
        ->whereIn('id', $product_id)
        ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));  
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($cart[$id]);

        Session::put('carts', $carts);  
        return true;
    }
}
