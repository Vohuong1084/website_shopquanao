<?php

namespace App\Http\Controllers\Admin\Users;

use session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\UpdateinforService;

class ChangeinforController extends Controller
{
    protected $UpdateinforService;

    public function __construct(UpdateinforService $UpdateinforService) {
        $this->UpdateinforService = $UpdateinforService;
    }

    public function index(Request $request, $id) {
        $title = "Thay đổi thông tin";
        if (!empty($id)) {
            $infor = $this->UpdateinforService->listUserByid($id);
            if (!empty($infor[0])) {
                $request->session()->put('id', $id);
                $infor = $infor[0];
            }
            // dd($infor);
        }
        else {
            session()->flash('error', 'Người dùng không tồn tại');
            return redirect()->route('infor');
        }
        return view('user.account.changeinfor', compact('title',));
    }

    public function update(Request $request) {
        $id = session('id');
        $this->UpdateinforService->update($request, $id);
        return redirect()->back();
    }
}
