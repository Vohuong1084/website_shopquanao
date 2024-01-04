<?php

namespace App\Http\Services\listCustomer;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    // liệt kê danh sách người mua
    public function listCustomer() {
        return DB::table('customers')->simplePaginate(10);
    }

    // Chi tiết đơn hàng của người mua
    public function inforCart($customer) {
        return $customer->carts()->with(['product' => function ($query) {
            $query->join('colors', 'colors.id', '=', 'products.color_id')
            ->join('sizes', 'sizes.id', '=', 'products.size_id')
            ->select('products.id', 'nameproduct', 'hinhanhproduct', 'soluong', 'colors.namecolor', 'sizes.namesize');
        }])->get();
    }

    // Xóa danh sách người mua
    public function destroy($request) {
        $id =  (int)$request->input('id');
        $customer = Customer::where('id', $id)->first();
        if ($customer) {
            return Customer::where('id', $id)->delete();
        }
        return false;
    }
}
