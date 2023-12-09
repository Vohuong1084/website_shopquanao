<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    // tạo giao diện
    public function create()
    {
        $infor = $this->productService->listMenu();
        $sizee = $this->productService->listSize();
        $colorr = $this->productService->listColor();
        return view('admin.product.addproduct', [
            'title' => 'Thêm Sản Phẩm',
            'infor' => $infor,
            'sizee' => $sizee,
            'colorr' => $colorr
        ]);
    }

    public function store(Request $request)
    {
        $this->productService->addProduct($request);

        return redirect()->back();
    }

   
    public function show(Request $request)
    {
        return view('admin.product.listproduct', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get($request)
        ]);
    }

    public function edit(Product $product)
    {
        // dd($id);
        return view('admin.product.editproduct',[
            'title' => 'Chỉnh Sửa Thông Tin Sản Phẩm',
            'products' => $product,
            'color' => $this->productService->listColor(),
            'size' => $this->productService->listSize(),
            'menus' => $this->productService->listMenu()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->productService->update($request, $id);
        return redirect('admin/product/listproduct');
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
                ' message' => 'Đã Xóa Sản Phẩm Thành Công'
            ]);
        }
    }
}
