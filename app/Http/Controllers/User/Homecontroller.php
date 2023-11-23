<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;

class Homecontroller extends Controller
{
    protected $MenuService;

    public function __construct(MenuService $MenuService) {
        $this->MenuService = $MenuService;
    }

    public function index() {
        $title = "Trang chủ";
        $menus = $this->MenuService->listAllMenu();
        return view('user.home', compact('title', 'menus'));
    }
}
