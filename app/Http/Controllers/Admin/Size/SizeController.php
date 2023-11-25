<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\SizeRequest;
use App\Http\Services\Size\SizeServices;
use Illuminate\Http\Request;

use App\Models;
use App\Models\Size;

class SizeController extends Controller
{
    protected $sizeServices;
    
    public function __construct(SizeServices $sizeServices)
    {
        $this->sizeServices = $sizeServices;
    }

    public function add()
    {
        return view('admin.size.add', [
            'title' => 'Thêm Size'
        ]);
    }

    public function store(SizeRequest $request) 
    {
        $result = $this->sizeServices->add($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.size.list', [
            'title' => 'Danh sách Size',
            'sizes' => $this->sizeServices->getAllSize()
        ]);
    }
    public function destroy(Request $request)
    {
        $result = $this->sizeServices->destroy($request);
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
    public function edit(Size $size)
    {
        return view('admin.size.edit', [
            'title' => 'Sửa Size' . $size->namecolor,
            'sizes' => $size
        ]);
    }
    public function update(Size $size, SizeRequest $request)
    {
        $this->sizeServices->update($size, $request);
        
        return redirect('admin/size/list');
    }
}