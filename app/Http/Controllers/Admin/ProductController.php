<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

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
<<<<<<< HEAD
            'sizee' => $sizee,
            'colorr' => $colorr
=======
>>>>>>> 14c8c4377bfe06cae9eb74f5d9ef449e7eec4959
        ]);
    }

    public function store(Request $request)
    {
        $this->productService->addProduct($request);

        return redirect()->back();
    }

   
    public function show()
    {
        return view('admin.product.listproduct', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get()
        ]);
    }

    public function edit(Product $product)
    {
        // dd($id);
        return view('admin.product.editproduct',[
            'title' => 'Chỉnh Sửa Thông Tin Sản Phẩm',
            'products' => $product,
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
