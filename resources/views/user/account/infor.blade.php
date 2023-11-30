@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thông tin cá nhân</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/home">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thông tin cá nhân</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <h1 class="text-center font-weight-semi-bold mb-3">Thông tin</h1>
                <center><img style="height: 200px; border-radius: 50%;" src="{{ Auth::user()->hinhanh }}" alt="ICON"></center>
                <div class="justify-content-center d-flex" style="margin-top: 20px;">
                    <a href="/logout" class="btn"><button class="btn btn-primary py-2 px-4" style="margin-right: 10px; width: 192px">Đăng xuất</button></a>
                    <a href="/changeinfor/{{ Auth::user()->id }}" class="btn"><button class="btn btn-primary py-2 px-4">Thay đổi thông tin</button></a>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Tên</h5>
                    <p class="mb-2">{{ Auth::user()->name }}</p>
                </div>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Email</h5>
                    <p class="mb-2">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
