@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th class="scope">STT</th>
                <th class="scope">Tên Sản Phẩm</th>
                <th class="scope">Mô Tả Chi Tiết</th>
                <th class="scope">Tên Danh Mục</th>
                <th class="scope">Giá</th>
                <th class="scope">Hình Ảnh</th>
                <th class="scope">Số Lượng</th>
                <th class="scope">Màu Sắc</th>
                <th class="scope">Kích Thước</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
                <tr>
                    <td style="width: 50px;">{{ $key + 1 }}</td>
                    <td>{{ $item->nameproduct }}</td>
                    <td>{!! $item->content !!}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <img src="{{ $item->hinhanhproduct }}" width="150" height="150">
                    </td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ $item->namecolor }}</td>
                    <td>{{ $item->namesize }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/product/edit/{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="removeRow({{ $item->id }}, '/admin/product/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div>
@endsection
