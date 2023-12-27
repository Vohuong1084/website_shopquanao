<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Services\Checkout;
use App\Http\Services\Checkout\CheckoutServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutServices $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $products = $this->checkoutService->getProduct();

        return view('user.Checkout.checkout', [
            'title' => 'Thủ tục thanh toán',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function addCart(Request $request) {
        $this->checkoutService->addCart($request);

        return redirect()->back();
    }
}
