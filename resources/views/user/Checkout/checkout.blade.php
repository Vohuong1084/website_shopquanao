@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thủ tục thanh toán</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/home">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thủ tục thanh toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        @if (Auth::check())

        <form method="post">
            <div class="row px-xl-5">
                @include('user.alert')
                <div class="col-lg-6">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Tên</label>
                                <input class="form-control" type="text" name="name" placeholder="Enter name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="e_mail" placeholder="example@email.com"
                                    required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="number_phone" placeholder="+0** *** ****"
                                    required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="address" placeholder="address" required>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="collapse mb-4" id="shipping-address">
                        <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-6">
                    @php
                        $total = 0;
                    @endphp
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>


                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Kích cỡ</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                @foreach ($products as $key => $item)
                                    <tr>
                                        @php
                                            $price = $item->price;
                                            $endPrice = $price * $carts[$item->id];
                                            $total += $endPrice;
                                        @endphp
                                        <td class="align-middle" style="width: 350px;">{{ $item->nameproduct }}
                                            <img src="{{ $item->hinhanhproduct }}" width="100px" height="100px"
                                                alt="">
                                        </td>
                                        <td class="align-middle"style="width: 70px">{{ $item->namecolor }}</td>
                                        <td class="align-middle"style="width: 150px">{{ $item->namesize }}</td>
                                        <td class="align-middle"style="width: 150px">{{ $carts[$item->id] }}</td>
                                        <td class="align-middle"style="width: 300px">{{ number_format($price) }} VNĐ</td>
                                    </tr>
                                @endforeach
                                {{-- <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$40</h6>
                            </div> --}}
                            </table>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">{{ number_format($total) }} VNĐ</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-footer border-secondary bg-transparent">
                    <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt
                        hàng</button>
                </div>
            </div>
            @csrf
        </form>

        @else
        <div style="margin: auto">
            <h1 style="text-align: center">Đăng Nhập Để Thanh Toán</h1>
        </div>
    @endif
    </div>
    <!-- Checkout End -->
@endsection
