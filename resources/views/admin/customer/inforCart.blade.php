@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->number_phone }}</strong></li>
        </ul>
    </div>

    <div class="cart">
        @php
            $total = 0;
        @endphp
        <table class="table">
            <tbody>
                <tr class="table_head">
                    <th class="column-1">Sản phẩm</th>
                    <th class="column-2">Hình ảnh</th>
                    <th class="column-3">Giá</th>
                    <th class="column-4">Màu sắc</th>
                    <th class="column-5">Kích cỡ</th>
                    <th class="column-6">Số lượng</th>
                    <th class="column-7">Thành tiền</th>
                </tr>

                @foreach ($cart as $item)
                    @php
                        $price = $item->price;
                        $endPrice = $price * $item->soluong;
                        $total += $endPrice;
                    @endphp
                    <tr class="table_row">
                        <td class="column-1">
                            {{ $item->product->nameproduct }}
                        </td>
                        <td class="column-2">
                            <div class="how-itemcart1">
                                <img src="{{ $item->product->hinhanhproduct }}" alt="IMG" width="100">
                            </div>
                        </td>
                        <td class="column-3">{{ number_format($price) }}</td>
                        <td class="column-4">{{ $item->product->namecolor }}</td>
                        <td class="column-5">{{ $item->product->namesize }}</td>
                        <td class="column-6">{{ $item->soluong }}</td>
                        <td class="column-7">{{ number_format($endPrice) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
