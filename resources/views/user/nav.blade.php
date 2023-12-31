<div class="row border-top px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
        <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
            <h6 class="m-0">Danh mục</h6>
            <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
            <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                @foreach ($menus as $item)
                    <a href="/cuahang/{{ $item->id }}-{{ Str::slug($item->name) }}.html" class="nav-item nav-link">{{ $item->name }}</a>
                @endforeach
            </div>
        </nav>
    </div>
    <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
            <a href="" class="text-decoration-none d-block d-lg-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="/home" class="nav-item nav-link">Trang chủ</a>
                    <a href="/cuahang" class="nav-item nav-link">Cửa hàng</a>
                    <a href="/checkout" class="nav-item nav-link">Thanh toán</a>
                    <a href="/lienhe" class="nav-item nav-link">Liên hệ</a>
                </div>
                <div class="navbar-nav ml-auto py-0">
                    @if (Auth::check())
                        <a href="/infor" class="nav-item nav-link">Xin chào, {{ Auth::user()->name }}</a>
                    @else
                        <a href="/login" class="nav-item nav-link">Đăng nhập</a>
                        <a href="/register" class="nav-item nav-link">Đăng kí</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>