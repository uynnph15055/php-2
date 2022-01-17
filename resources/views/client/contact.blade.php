<!-- Content -->
@extends('client.layout.client');
@section('title' , 'Liên hệ')
@section('linkCss');
<link rel="stylesheet" href="{{ asset('client/Css/contact.css') }}">
@endsection
@section('main_content')
<main class="content ">
    <section class="address">
        <h3 class="address__title">Liên hệ với chúng tôi</h3>
        <h4 class="address__name-shop">Shop giày Sneaker – Qcshop</h4>
        <p class="address__description">Qcshop là cửa hàng chuyên cung cấp giày Sneaker nam nữ cho tất cả các
            bạn trẻ.Chúng tôi sẽ liên tục cập nhật những sản phẩm mới nhất, chất lượng nhất, hợp thời nhất giúp
            các bạn có những trải nghiệm tuyệt vời!</p>
        <ul class="address__list">
            <li class="address__item">
                <i class="fas fa-map-marker-alt"></i>
                <span class="address__span">Địa chỉ :</span>Hương Sơn - Mỹ Đức - Hà Nội.
            </li>
            <li class="address__item">
                <i class="fas fa-mobile-alt"></i>
                <span style="margin-left: 8px;" class="address__span">Hotline :</span><a href=""> 0349 791
                    128</a>
            </li>
            <li class="address__item">
                <i class="fas fa-envelope"></i>
                <span>Email: </span>uynnph15055@fpt.edu
            </li>
        </ul>
        </ul>
    </section>
    <section class="form__contact">
        <p class="form__contact-text">Mọi ý kiến đóng góp, liên hệ, khiếu nại khác vui lòng điền đầy đủ thông
            tin và gửi đến chúng tôi.
            Bộ phận hỗ trợ khách hàng sẽ phản hồi sớm nhất khi nhận được thông tin.</p>

        <form class="form-contact" action="">
            <input type="text" class="form-import" placeholder="Họ và tên">
            <br>
            <input type="text" class="form-import" placeholder="Số điện thoại">
            <br>
            <input type="email" class="form-import" placeholder="Địa chỉ email">
            <br>
            <div class="input__radio-bg">
                <input type="radio" checked name="service"> Than phiền
                <input type="radio" name="service"> Góp ý
                <input type="radio" name="service"> Tư vẫn
                <input type="radio" name="service"> Mua hàng
                <input type="radio" name="service"> Khác
            </div>
            <input type="email" class="form-import" placeholder="Tiêu đề">
            <input type="email" class="form-import" placeholder="Tiêu đề">
            <textarea name="" id="" placeholder="Nội dung" class="content-import" cols="30" rows="7"></textarea>
        </form>
    </section>
</main>
@endsection