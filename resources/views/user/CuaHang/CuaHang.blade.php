@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/home">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cửa hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Giá tiền</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">Tất cả</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">100.000 - 200.000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">200.000 - 300.000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">300.000 - 400.000</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">400.000 - 500.000</label>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Màu</h5>
                    <form id="myForm">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3 pl-0">
                            <a href="{{ request()->url() }}" style="text-decoration: none" class="btn text-dark pl-0">Tất cả</a>
                        </div>
                        @foreach ($color as $item)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3 pl-0">
                                <a href="{{ request()->fullUrlWithQuery(['namecolor' => $item->namecolor]) }}" style="text-decoration: none" class="btn text-dark pl-0">{{ $item->namecolor }}</a>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Kích cỡ</h5>
                    <form id="sizeForm">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3 pl-0">
                            <a href="{{ request()->url() }}" style="text-decoration: none" class="btn text-dark pl-0">Tất cả</a>
                        </div>
                        @foreach ($size as $item)
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3 pl-0">
                                <a href="{{ request()->fullUrlWithQuery(['namesize' => $item->namesize]) }}" style="text-decoration: none" class="btn text-dark pl-0">{{ $item->namesize }}</a>
                            </div>
                        @endforeach
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sắp xếp
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}">Giá tăng dần</a>
                                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}">Giá giảm dần</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($product) > 0)
                        @foreach ($product as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ $item->hinhanhproduct }}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $item->nameproduct }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ number_format($item->price) }} VNĐ</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-center bg-light border">
                                        <a href="/cuahang/{{ $item->id }}/{{ Str::slug($item->nameproduct) }}.html" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="margin: auto">
                            <h1>Không có sản phẩm nào</h1>
                        </div>
                    @endif
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                {{ $product->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
@endsection
