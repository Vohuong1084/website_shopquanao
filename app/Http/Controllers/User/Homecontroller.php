<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class Homecontroller extends Controller
{
    protected $MenuService;
    protected $ProductService;

    public function __construct(MenuService $MenuService, ProductService $ProductService) {
        $this->MenuService = $MenuService;
        $this->ProductService = $ProductService;
    }

    public function index() {
        $title = "Trang chủ";
        $menus = $this->MenuService->show();
        $products = $this->ProductService->getProduct();
        return view('user.home', compact('title', 'menus', 'products'));
    }
}

