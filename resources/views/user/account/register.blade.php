@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng kí</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Login Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5 container">
                <div class="contact-form">
                    <div id="success">
                        @include('user.alert')
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập username"
                                required="required" data-validation-required-message="Nhập username" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email"
                                required="required" data-validation-required-message="Nhập email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" id="subject" name="password" placeholder="Nhập mật khẩu"
                                required="required" data-validation-required-message="Nhập mật khẩu" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" id="subject" name="passwordcomfirm" placeholder="Nhập lại mật khẩu"
                                required="required" data-validation-required-message="Nhập lại mật khẩu" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group" style="margin-bottom: 15px">
                            <input class="form-control" id="upload1" type="file">
                        <div id="img_show" style="margin-left: 10px;">

                        </div>
                        <input type="hidden" name="hinhanh" id="hinhanh">
                        </div>
                        <div>
                            <button class="container btn btn-primary py-2 px-4" type="submit">Đăng kí</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
