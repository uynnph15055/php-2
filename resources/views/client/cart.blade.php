@extends('client.layout.client')
@section('title' , 'Giỏ hàng')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/cart.css') }}">
@endsection
@section('main_content')
<div class="content padding__header">
    <main>
        <section class="main__header">
            <ul class="page__present">
                <li class="page__present-item"><a class="back-color" href="">Giỏ hàng</a><i class="fas fa-chevron-right"></i></li>
                <li class="page__present-item"><a class="primary-color" href="">Thanh Toán</a><i class="fas fa-chevron-right"></i></li>

                <li class="page__present-item"><a class="primary-color" href="">Hoàn tất</a></li>
            </ul>
        </section>
        <form action="">
            <section class="main__cart">
                <div class="main__cart-info">
                    <table class="table__cart">
                        <thead class="tr_thead">
                            <tr>
                                <th width="400px">Sản phẩm</th>
                                <th width="120px">Giá</th>
                                <th width="100px">Chi tiết</th>
                                <th width="120px">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            @foreach($cart as $key)

                            <tr>
                                <td class="td-fast" style="margin-left: 0;">
                                    <a href="{{ route('deleteCart', ['id' => $key['id']]) }}"><i class="far fa-trash-alt"></i></a>
                                    <img width="80px" class="product__hot-list-detail-img" src="{{ asset('upload/'.$key['img']) }}" alt="">
                                    <p class="nameProduct">
                                        {{$key['name']}}
                                    </p>
                                </td>
                                <td class="primary-color">
                                    <?= number_format($key['price'], 0, ",", ".") ?>đ
                                </td>
                                <td>
                                    <?php
                                    $detail = explode(',', $key['size']);
                                    ?>
                                    @foreach($detail as $ky =>$value)
                                    <p>{{$value}}</p>
                                    @endforeach
                                </td>
                                <td class="primary-color"><?= number_format($key['price'] * $key['number'], 0, ",", ".") ?><span>đ</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="btn__table-cart">
                        <a class="continue__view" href="{{ route('product') }}"> <i class="fas fa-arrow-left"></i> Tiếp tục xem sản
                            phẩm</a>
                        <a class="update__cart" href="">Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="receipt__cart">
                    <?php $sum_money = 0;
                    foreach ($cart as $key) {
                        $sum_money += $key['number'] * $key['price'];
                    }
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th width="100%">Cộng giỏ hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Tạm tính</h4>
                                    <p><?= number_format($sum_money, 0, ",", ".") ?><span>đ</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="tr__total">
                                    <h4>Tổng tiền</h4>
                                    <p><?= number_format($sum_money, 0, ",", ".") ?><span>đ</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn-payment" type="button"><a style="color:#ffff" href="{{ route('pagePay') }}">Tiến hành thanh toán</a></button>
                </div>
            </section>
        </form>
    </main>
</div>
@endsection