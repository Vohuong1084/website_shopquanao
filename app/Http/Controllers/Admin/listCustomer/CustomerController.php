<?php

namespace App\Http\Controllers\Admin\listCustomer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\listCustomer\CustomerService;

class CustomerController extends Controller
{
    protected $CustomerService;

    public function __construct(CustomerService $CustomerService) {
        $this->CustomerService = $CustomerService;
    }

    // Trang list danh sách người mua hàng
    public function index() {
        $title = "Danh sách người mua";
        $list = $this->CustomerService->listCustomer();
        return view('admin.customer.listCustomer', compact('list', 'title'));
    }

    // Trang hiển thị sản phẩm khách hàng đã mua
    public function inforCart(Customer $customer) {
        $title = "Đơn hàng của người mua";
        $cart = $this->CustomerService->inforCart($customer);
        return view ('admin.customer.inforCart', compact('title', 'customer', 'cart'));
    }

    // Xóa danh sách người mua
    public function destroy(Request $request) {
        $result = $this->CustomerService->destroy($request);
        if($result)
        {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Thành Công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
