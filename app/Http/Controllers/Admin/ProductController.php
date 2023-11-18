<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        
    }

    // tạo giao diện
    public function create()
    {
        $infor = $this->productService->listMenu();
        return view('admin.product.addproduct', [
            'title' => 'Thêm Sản Phẩm',
            'infor' => $infor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // 
    public function store(Request $request)
    {
        $this->productService->addProduct($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.product.listproduct', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // 
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
        if($result)
        {
            return response()->json([
                'error' => false,
                'message' => 'Đã Xóa Sản Phẩm Thành Công'
            ]);
        }
    }
}
