<?php

namespace App\Http\Services\Checkout;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CheckoutServices
{
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $product_id = array_keys($carts);
        return Product::join('colors', 'colors.id', '=', 'products.color_id')
            ->join('sizes', 'sizes.id', '=', 'products.size_id')
            ->select('products.*', 'colors.namecolor', 'sizes.namesize')
            ->whereIn('products.id', $product_id)
            ->get();
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
        $query = DB::table('products')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->join('sizes', 'sizes.id', '=', 'products.size_id')
            ->select('products.*', 'colors.namecolor', 'sizes.namesize');

        $results = $query
            ->orderByDesc('id')
            ->paginate(9);

        return $results;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'number_phone' => $request->input('number_phone'),
                'address' => $request->input('address'),
                'e_mail' => $request->input('e_mail')
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit();
            // Session::flash('success', 'Đặt Hàng Thành Công');
            $request->session()->flash('success', 'Đặt Hàng Thành Công');

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            $request->session()->flash('error', 'Đặt Hàng Không Thành Công, Vui Lòng Thử Lại');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $product_id = array_keys($carts);
        $products = Product::join('colors', 'colors.id', '=', 'products.color_id')
            ->join('sizes', 'sizes.id', '=', 'products.size_id')
            ->select('products.*', 'colors.namecolor', 'sizes.namesize')
            ->whereIn('products.id', $product_id)
            ->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $item->id,
                'soluong'   => $carts[$item->id],
                'price' => $item->price
            ];
        }

        return Cart::insert($data);
    }
}
