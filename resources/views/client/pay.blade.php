@extends('client.layout.client')
@section('title' , 'Thanh toán')
@section('linkCss')
<link rel="stylesheet" href="{{asset('client/Css/pay.css')}}">
@endsection
@section('main_content')
<div class="content-body">
    <section class="main__header">
        <ul class="page__present">
            <li class="page__present-item"><a class="primary-color" href="">Giỏ hàng</a><i class="fas fa-chevron-right"></i></li>
            <li class="page__present-item"><a class="back-color" href="">Thanh Toán</a><i class="fas fa-chevron-right"></i></li>

            <li class="page__present-item"><a class="primary-color" href="">Hoàn tất</a></li>
        </ul>
    </section>
    <main class="padding__header">
        <form action="{{ route('storeBill') }}" method="POST" class="container-pay">
            @csrf
            <session class="form-pay-bg">
                <h2>Thông tin thanh toán</h3>
                    <div class="form-pay">
                        <div class="input-bg">
                            <input type="text" name="name" value="{{$user_info->name}}" placeholder="Họ tên của bạn">
                        </div>
                        <div class="input-bg">
                            <input type="email" name="email" value="{{$user_info->email}}" placeholder="Email của bạn">
                        </div>
                        <div class="input-bg">
                            <input type="text" name="address" value="{{$user_info->address}}" placeholder="Địa chỉ : vd : -Hương Sơn - Mỹ Đức - Hà Nội">
                        </div>
                        <div class="input-bg">
                            <input type="text" name="phone" value="{{$user_info->phone}}" placeholder="Số điện thoại">
                        </div>
                        <div class="input-bg">
                            <select name="address_detail">
                                <option selected value="">Địa chỉ cụ thể</option>
                                <option value="0">Nhà riêng</option>
                                <option value="1">Văn phòng</option>
                            </select>
                            <select name="type_pay">
                                <option selected value="">Hình thức</option>
                                <option value="0">Thanh toán tại nhà</option>
                                <option value="1">Thanh toán qua thẻ</option>
                            </select>
                        </div>
                        <div class="input-bg">
                            <h5>Ghi chú đặt hàng (Tùy chọn)</h5>
                            <textarea name="note" id="" class="input-note" placeholder="Ghi chú về đơn hàng"></textarea>
                        </div>
                    </div>
            </session>
            <section class="info-receipt-bg">
                <div class="receipt-bg">
                    <h3>Đơn hàng của bạn</h3>
                    <table class="table">
                        <thead>
                            <tr class="th-bg">
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tạm tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $key)
                            <tr class="td-bg">
                                <td scope="row">{{$key['name']}} x <span class="name-size">{{$key['number']}}</span></td>
                                <td><?= number_format($key['price'] * $key['number'], 0, ",", ".") ?>đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h3 class="sumMoney">Tổng tiền : <span>3.500.000 đ</span></h3>
                    <h4 class="pay-home">Trả tiền mặt khi nhận hàng</h4>
                    <p class="note-pay">Sau khi quý khách đặt hàng. Chúng tôi sẽ gửi thông tin đơn hàng qua
                        Email và gọi điện xác
                        nhận
                        đơn hàng. Sau đó sẽ tiến hành vận chuyển hàng. Quý khách thanh toán khi nhận được hàng
                    </p>
                    <div class="input-sale">
                        <input type="text" placeholder="Mã giảm giá :  VD - 234578">
                    </div>
                    <button class="btn__pay" type="submit">Thanh toán</button>
                </div>
            </section>
        </form>
    </main>
</div>
@endsection