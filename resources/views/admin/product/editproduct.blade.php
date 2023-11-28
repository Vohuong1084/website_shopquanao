@extends('admin.main')

@section('content')
    @include('admin.alert')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="nameproduct" value="{{ $products->nameproduct }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="0" {{ $products->menu_id == 0 ? 'selected' : '' }}>Danh mục</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $products->menu_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price" value="{{ $products->price }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="soluong" value="{{ $products->soluong }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <select name="color_id" id="color_id" class="form-control">
                            <option value="0" {{ $products->color_id == 0 ? 'selected' : '' }}>Danh mục</option>
                            @foreach ($color as $item)
                                <option value="{{ $item->id }}" {{ $products->color_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->namecolor }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Size</label>
                        <select name="size_id" id="size_id" class="form-control">
                            <option value="0" {{ $products->size_id == 0 ? 'selected' : '' }}>Danh mục</option>
                            @foreach ($size as $item)
                                <option value="{{ $item->id }}" {{ $products->size_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->namesize }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputSuccess">Mô tả chi tiết</label>
                <textarea type="text" class="form-control is-warning" id="content" name="content">{{ $products->content }}</textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" style="margin-right: 20px">Ảnh sản phẩm hiện tại</label>
                <img src="{{ $products->hinhanhproduct }}" width="150" height="150">
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
            <button type="submit" class="btn btn-primary">Cập nhật Sản Phẩm</button>
        </div>
        @csrf
    </form>
@endsection
