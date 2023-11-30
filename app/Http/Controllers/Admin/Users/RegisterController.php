<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\RegisterService;
use App\Http\Requests\Account\RegisterRequest;

class RegisterController extends Controller
{
    protected $RegisterService;

    public function __construct(RegisterService $RegisterService) {
        $this->RegisterService = $RegisterService;
    }

    public function index() {
        $title = "Đăng kí";
        return view('user.account.register', compact('title'));
    }

    public function insert(RegisterRequest $request) {
        $this->RegisterService->insert($request);

        return redirect()->back();
    }
}
