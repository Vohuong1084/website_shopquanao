@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Size</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $key => $item)
                <tr>
                    <td style="width: 150px;">{{ $key + 1 }}</td>
                    <td>{{ $item->namesize }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/size/edit/{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="removeRow({{ $item->id }}, '/admin/size/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
