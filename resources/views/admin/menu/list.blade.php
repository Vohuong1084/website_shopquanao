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
                    <td><img src="{{ asset('img') }}/{{ date('Y/m/d') }} / {{ $item->hinhanh }}"width="150" height="150"></td>
                </tr>
            @endforeach
            <tr>

            </tr>
        </tbody>
    </table>
@endsection
