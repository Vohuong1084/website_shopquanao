@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng nhập</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Login Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5 container">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="" method="POST">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                                required="required" data-validation-required-message="Hãy nhập username" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control" id="subject" name="password" placeholder="Password"
                                required="required" data-validation-required-message="Hãy nhập mật khẩu" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="container btn btn-primary py-2 px-4" type="submit">Đăng nhập</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
