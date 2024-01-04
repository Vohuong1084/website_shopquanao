@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th class="scope">STT</th>
                <th class="scope">Tên khách hàng</th>
                <th class="scope">Số điện thoại</th>
                <th class="scope">Địa chỉ</th>
                <th class="scope">Email</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
                <tr>
                    <td style="width: 50px;">{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->number_phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->e_mail }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/listCustomer/{{ $item->id }}">
                            <i class="fas fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="removeRow({{ $item->id }}, '/admin/listCustomer/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $list->links() !!}
    </div>
@endsection
