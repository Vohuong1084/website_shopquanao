<?php

namespace App\Http\Controllers\User\ProductDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Product\ProductDetailServices;

class ProductDetailController extends Controller
{
    protected $ProductDetailServices;
    protected $ProductService;

    public function __construct(ProductDetailServices $ProductDetailServices, ProductService $ProductService) {
        $this->ProductDetailServices = $ProductDetailServices;
        $this->ProductService = $ProductService;
    }

    public function index($id, $slug='') {
        $product = $this->ProductService->getProductId($id);
        $product_menus = $this->ProductService->getProductMenu($product);
        $comment = $this->ProductDetailServices->comment($id);
        $star = $this->ProductDetailServices->star($id);
        $num_review = $this->ProductDetailServices->num_review($id);
        // dd($product_menus);
        $title = $product->nameproduct;
        return view('user.ProductDetail.ProductDetail', compact('title', 'product', 'product_menus', 'comment', 'star', 'num_review'));
    }
}
