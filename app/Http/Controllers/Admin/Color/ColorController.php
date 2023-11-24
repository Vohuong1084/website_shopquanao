<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Services\Color\ColorServices;
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
}
