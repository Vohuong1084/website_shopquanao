@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/home">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    @if (Auth::check())
        <form method="post">
            @if (count($products) != 0)
                <div class="container-fluid pt-5">
                    <div class="row px-xl-5">
                        <div class="col-lg-8 table-responsive mb-5">
                            @php
                                $total = 0;
                            @endphp
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        {{-- <th></th> --}}
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Màu</th>
                                        <th>Kích cỡ</th>
                                        <th>Tổng tiền</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($products as $key => $item)
                                        @php
                                            $price = $item->price;
                                            $endPrice = $price * $carts[$item->id];
                                            $total += $endPrice;
                                        @endphp
                                        <tr>
                                           
                                            <td class="align-middle"><img src="{{ $item->hinhanhproduct }}" width="100"> <br>
                                                {{ $item->nameproduct }}</td>
                                            <td class="align-middle">{{ number_format($price) }} VNĐ</td>
                                            <td class="align-middle">
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-primary btn-minus">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control form-control-sm bg-secondary text-center"
                                                        value="{{ $carts[$item->id] }}"
                                                        name="num_product[{{ $item->id }}]">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-primary btn-plus">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">{{ $item->namecolor }}</td>
                                            <td class="align-middle">{{ $item->namesize }}</td>
                                            <td class="align-middle">{{ number_format($endPrice) }}</td>
                                            <td class="align-middle">
                                                <a href="/carts/delete/{{ $item->id }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button type="submit" formaction="/update"
                                    class="btn btn-block btn-primary my-3 py-3">Cập nhật giỏ hàng</button>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="card border-secondary mb-5">
                                <div class="card-header bg-secondary border-0">
                                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                                </div>
                                <div class="card-body">
                                </div>
                                <div class="card-footer border-secondary bg-transparent">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5 class="font-weight-bold">Total</h5>
                                        <h5 class="font-weight-bold">{{ number_format($total) }}</h5>
                                    </div>
                                    <a href="/checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To
                                        Checkout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <h2>Giỏ hàng trống</h2>
                </div>
            @endif
            @csrf
        </form>
    @else
        <div style="margin: auto">
            <h1 style="text-align: center">Đăng Nhập Để Xem Giỏ Hàng</h1>
        </div>
    @endif
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
