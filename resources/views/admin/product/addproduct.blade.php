@extends('admin.main')


@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="nameproduct">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="0">Danh mục</option>
                            @foreach ($infor as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" class="form-control" name="soluong">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <select name="color_id" id="color_id" class="form-control">
                            <option value="0">Màu sắc</option>
                            @foreach ($colorr as $item)
                            <option value="{{ $item->id }}">{{ $item->namecolor }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Size</label>
                        <select name="size_id" id="size_id" class="form-control">
                            <option value="0">Size</option>
                            @foreach ($sizee as $item)
                            <option value="{{ $item->id }}">{{ $item->namesize }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="content">Mô tả chi tiết</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputError">Chọn ảnh sản phẩm</label>
                <input class="form-control form-control-sm" id="upload" type="file" style="height: 35px">
                <div id="img_show">

                </div>
                <input type="hidden" name="hinhanhproduct" id="hinhanh">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
