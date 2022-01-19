@extends('client.layout.client')
@section('title' , 'Giỏ hàng')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/cart.css') }}">
@endsection
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
                                <th width="100px">Số lượng</th>
                                <th width="120px">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <tr>
                                <td class="td-fast">
                                    <a href=""><i class="far fa-trash-alt"></i></a>
                                    <img width="80px" class="product__hot-list-detail-img" src="assets/image/Giay-Puma-Full-Trang.jpg" alt="">
                                    <p class="nameProduct">
                                        Giày Nike Air Force 1 ID Gucci - <span>41</span></p>
                                </td>
                                <td class="primary-color">
                                    690.000 <span>đ</span>
                                </td>
                                <td>
                                    1
                                </td>
                                <td class="primary-color">500000 <span>đ</span></td>
                            </tr>
                            <tr>
                                <td class="td-fast">
                                    <i class="far fa-trash-alt"></i>
                                    <img width="80px" class="product__hot-list-detail-img" src="assets/image/Giay-Puma-Full-Trang.jpg" alt="">
                                    <p class="nameProduct">
                                        Giày Nike Air Force 1 ID Gucci - <span>41</span></p>
                                </td>
                                <td class="primary-color">
                                    690.000 <span>đ</span>
                                </td>
                                <td>
                                    1
                                </td>
                                <td class="primary-color">500000 <span>đ</span></td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                    <div class="btn__table-cart">
                        <a class="continue__view" href=""> <i class="fas fa-arrow-left"></i> Tiếp tục xem sản
                            phẩm</a>
                        <a class="update__cart" href="">Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="receipt__cart">
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
                                    <p>1.250.000 <span>đ</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="tr__total">
                                    <h4>Tổng tiền</h4>
                                    <p>1.250.000 <span>đ</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn-payment" type="button">Tiến hành thanh toán</button>
                </div>
            </section>
        </form>
    </main>
</div>