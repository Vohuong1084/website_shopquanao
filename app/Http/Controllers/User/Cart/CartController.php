<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\CartServices;
use Illuminate\Http\Client\Request;

class CartController extends Controller
{
    protected $CartServices;
     
    public function __construct(CartServices $CartServices)
    {
        $this->CartServices = $CartServices;
    }
    
    public function index()
    {   
        // $this->CartServices->addToCart($request);
        return view('user.Cart.cart', [
            'title' => 'Giỏ hàng'
            // 'products' => $this->CartServices->addToCart($request)
        ]); 
    }
}