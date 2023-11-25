@extends('admin.main')

@section('content')
    <table class="table">
        <th>
            <tr>
                <th>STT</th>
                <th>Màu</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </th>

        <tbody>
            @foreach ($colors as $key => $item)
                <tr>
                    <td style="width: 150px;">{{ $key + 1 }}</td>
                    <td>{{ $item->namecolor }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/color/edit/{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn btn-danger btn-sm" onclick="removeRow({{ $item->id }},'/admin/color/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
