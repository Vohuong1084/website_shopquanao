<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Services\Checkout;
use App\Http\Services\Checkout\CheckoutServices;
use Illuminate\Http\Request;

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
            'products' => $products
        ]);
    }
}
