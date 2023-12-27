@extends('user.main')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">{{ $product->nameproduct }}</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="/home">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">{{ $product->nameproduct }}</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="w-100 h-100" src="{{ $product->hinhanhproduct }}" alt="Image">
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->nameproduct }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $star)
                                <small class="zmdi zmdi-star"></small>
                            @else
                                <small class="zmdi zmdi-star-outline"></small>
                            @endif
                        @endfor
                    </div>

                    <small class="pt-1">({{ $num_review }} bình luận)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->price) }} VNĐ</h3>
                
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Size:</p>
                    <label>{{ $product->namesize }}</label>
                    <input type="hidden" name="namesize" value="{{ $product->namesize }}">
                </div>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Color:</p>
                    <label>{{ $product->namecolor }}</label>
                    <input type="hidden" name="namecolor" value="{{ $product->namecolor }}">
                </div>
                <form action="/add-cart" method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" style="border: none;"
                                class="form-control bg-secondary text-center" name="num_product" value="1">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            @if (Auth::check())
                                <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1">
                                    </i> Add To Cart</button>
                            @else
                                <div style="margin: 20px 0">
                                    <h3>Đăng nhập để mua hàng</h3>
                                </div>
                            @endif
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Bình luận</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Mô tả sản phẩm</h4>
                        <p>{!! $product->content !!}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row">
                            {{-- Review --}}
                            <style>
                                /* Để đảm bảo thanh cuộn xuất hiện, thiết lập chiều cao cố định cho phần tử chứa nội dung dài */
                                .scrollable-content {
                                    max-height: 300px;
                                    /* Chiều cao tối đa của phần tử chứa nội dung */
                                    overflow-y: auto;
                                    /* Hiển thị thanh cuộn dọc khi nội dung vượt quá chiều cao */
                                }
                            </style>
                            <div class="col-md-6">
                                <h4 class="mb-4">Bình luận</h4>
                                <div class="scrollable-content">
                                    <div id="comment_show"></div>
                                    @foreach ($comment as $item)
                                        <div class="media mb-4">
                                            <img src="{{ $item->hinhanh }}" alt="Image" class="img-fluid mr-3 mt-1"
                                                style="width: 45px; border-radius: 50%;">
                                            <div class="media-body">
                                                <h6>{{ $item->username }}<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>{{ $item->created_at }}</i></small>
                                                </h6>
                                                <div class="text-primary mb-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $item->rating)
                                                            <i class="zmdi zmdi-star"></i>
                                                        @else
                                                            <i class="zmdi zmdi-star-outline"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p>{{ $item->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- End review --}}

                            {{-- Add review --}}
                            <div class="col-md-6">
                                <h4 class="mb-4">Viết bình luận</h4>
                                @if (Auth::check())
                                    <form method="POST">
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">Đánh giá sao * :</p>
                                            <span class="wrap-rating fs-18 cl11 pointer" id="star">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input type="number" class="dis-none" style="display: none" id="rating">
                                            </span>
                                        </div>

                                        
                                        <input type="hidden" name="username" id="username"
                                            value="{{ Auth::user()->name }}">
                                        <input type="hidden" name="hinhanh" id="hinhanh"
                                            value="{{ Auth::user()->hinhanh }}">
                                        <input type="hidden" name="comment_product_id" id="comment_product_id"
                                            value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" id="user_id"
                                            value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="message">Bình luận của bạn *</label>
                                            <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div id="erorr"></div>
                                        <div class="form-group mb-0">
                                            <button type="submit" id="send_comment" class="btn btn-primary px-3">Bình
                                                luận</button>
                                        </div>
                                        @csrf
                                    </form>
                                @else
                                    <div class="d-flex my-3">
                                        <p>Đăng nhập để viết bình luận</p>
                                    </div>
                                @endif

                            </div>
                            {{-- End add review --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($product_menus as $item)
                        <div class="card product-item border-0">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ $item->hinhanhproduct }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ number_format($item->price) }} VNĐ</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
