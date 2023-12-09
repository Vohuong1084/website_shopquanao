<?php

namespace App\Http\Services\Checkout;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class CheckoutServices
{   
    public function getProduct()
    {
        $carts = Session::get('carts');
        if(is_null($carts)) return [];

        $product_id = array_keys($carts);
        return Product::select('id', 'nameproduct', 'soluong', 'price', 'hinhanhproduct')
        ->whereIn('id', $product_id)
        ->get();
    }
}