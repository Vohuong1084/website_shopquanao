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
                    <a href="/infor" style="padding: 0;"><button class="btn btn-primary py-2 px-4" style="margin-right: 10px; width: 192px">Quay lại</button></a>
                    <form action="/updateinfor" method="post">
                        <button class="btn btn-primary py-2 px-4" name="submit" type="submit" style="height: 41.6px; width: 192px">Xác nhận</button>
                </div>
                </div>
                <div class="col-lg-5 mb-5">
                    @include('user.alert')
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Tên</h5>
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Email</h5>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Mật khẩu</h5>
                        <div class="control-group">
                            <input type="password" class="form-control" id="subject" name="password" placeholder="Nhập mật khẩu"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Xác nhận mật khẩu</h5>
                        <div class="control-group">
                            <input type="password" class="form-control" id="subject" name="passwordcomfirm" placeholder="Nhập lại mật khẩu"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                    @csrf
                </form>
            </div>
    </div>
    <!-- Contact End -->
@endsection
