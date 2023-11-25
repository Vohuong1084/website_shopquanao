@extends('Admin.main')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary mb-0">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                value="{{ $menus->name }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="inputError">Chọn ảnh danh mục</label>
                            <input class="form-control form-control-sm" id="upload" type="file" style="height: 35px">
                            <div id="img_show">
                                <a href="{{ $menus->hinhanh }}" target="_blank">
                                    <img src="{{ $menus->hinhanh }}" width="100px">
                                </a>

                            </div>
                            <input type="hidden" name="hinhanh" id="hinhanh" value="{{ $menus->hinhanh }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
