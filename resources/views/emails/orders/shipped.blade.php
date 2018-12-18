@component('mail::message')
# Đơn hàng {{ $product->id }} đẵ được mua thành công!

## Thông tin người mua

Tên: *{{ $name }}*

Email: *{{ $email }}*

SĐT: *{{ $phone }}*

Địa chỉ: *{{ $address }}*

## Chi tiết đơn hàng

@component('mail::table')
| Sản phẩm             | Đơn giá               | Số lượng | Tổng                  |
|:---------------------|:---------------------:|:--------:|----------------------:|
| {{ $product->name }} | {{ $product->price }} | 1        | {{ $product->price }} |
@endcomponent

## Ghi chú

@component('mail::panel')
{{ $note }}
@endcomponent

@component('mail::button', ['url' => 'https://lequyettien.blogspot.com', 'color' => 'success'])
Xác nhận
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
