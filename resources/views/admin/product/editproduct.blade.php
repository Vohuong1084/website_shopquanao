@extends('admin.main')

@section('content')
    @include('admin.arlet')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $products->nameproduct }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="0" {{ $infor->menu_id == 0 ? 'selected' : '' }}>Danh mục</option>
                            @foreach ($menu_id as $item)
                                <option value="{{ $item->id }}" {{ $infor->menu_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price" value="{{ $infor->price }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="soluong" value="{{ $infor->soluong }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input type="text" class="form-control" name="mausac" value="{{ $infor->mausac }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Size</label>
                        <input type="text" class="form-control" name="size" value="{{ $infor->size }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputSuccess">Mô tả chi tiết</label>
                <textarea type="text" class="form-control is-warning" id="content" name="content">{{ $infor->content }}</textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" style="margin-right: 20px">Ảnh sản phẩm hiện tại</label>
                <img src="{{ $infor->hinhanhproduct }}" width="150" height="150">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputError">Chọn ảnh sản phẩm mới</label>
                <input class="form-control form-control-sm" id="upload" name='hinhanh' type="file"
                    style="height: 35px">
                <div id="img_show">

                </div>
                <input type="hidden" name="hinhanh" id="hinhanh">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
