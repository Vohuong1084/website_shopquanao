@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th class="scope">STT</th>
                <th class="scope">Tên Danh Mục</th>
                <th class="scope">Hình Ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ $item->hinhanh }}" width="150" height="150"></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/Admin/Menu/edit/{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="/Admin/Menu/delete/{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            <tr>

            </tr>
        </tbody>
    </table>
@endsection
