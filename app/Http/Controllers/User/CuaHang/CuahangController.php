<?php

namespace App\Http\Controllers\User\CuaHang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Size\SizeServices;
use App\Http\Services\Color\ColorServices;
use App\Http\Services\Product\ProductService;

class CuahangController extends Controller
{
    protected $ColorServices;
    protected $SizeServices;
    protected $ProductService;
    protected $MenuService;

    public function __construct(ColorServices $ColorServices, SizeServices $SizeServices, ProductService $ProductService, MenuService $MenuService) {
        $this->ColorServices = $ColorServices;
        $this->SizeServices = $SizeServices;
        $this->ProductService = $ProductService;
        $this->MenuService = $MenuService;
    }

    public function index(Request $request) {
        $title = 'Cửa hàng';
        $product = $this->ProductService->get($request);
        return view('user.CuaHang.CuaHang', compact('title', 'product'));
    }

    public function indexById($id, $slug='',Request $request) {
        $menus = $this->MenuService->listMenuById($id);
        $title = 'Cửa hàng';
        $product = $this->ProductService->getByMenu($menus, $request);
        return view('user.CuaHang.CuaHang', compact('title', 'product'));
    }

    // Phân loại size 
    public function sizeFilter(Request $request) {
        $title = 'Cửa hàng';
        $color = $this->ColorServices->getAllColor();
        $size = $this->SizeServices->getAllSize();
        $product = $this->ProductService->size($request);
        if ($product) {
            return response()->json([
                'error' => false,
                'product' => $product
            ]);
        }
    }
}
