<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ColorRequest;
use App\Http\Services\Color\ColorServices;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{
    protected $colorServices;

    public function __construct(ColorServices $colorServices)
    {
        $this->colorServices = $colorServices;
    }
    public function add()
    {
        return view('admin.color.add',[
            'title' => 'Thêm Màu'
        ]);
    }

    public function store(ColorRequest $request)
    {
        $result = $this->colorServices->add($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.color.list', [
            'title' => 'Danh sách Màu',
            'colors' => $this->colorServices->getAllColor()
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->colorServices->destroy($request);
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
    public function edit(Color $color)
    {
        return view('admin.color.edit', [
            'title' => 'Sửa Màu ' . $color->namecolor,
            'colors' => $color
        ]);
    }

    public function update(Color $color, ColorRequest $request)
    {
        $this->colorServices->update($color, $request);
        return redirect('admin/color/list');
    }
}
