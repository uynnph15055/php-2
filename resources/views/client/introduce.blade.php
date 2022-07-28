@extends('client.layout.client')
@section('title' , 'Giới thiệu')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/desription.css') }}">
<link rel="stylesheet" href="{{ asset('client/Css/sliderbar.css') }}">
@endsection
@section('main_content')
<main class="main__bg">
    <section class="content">
        <p class="content-text">
            Xin chào quý khách! – Chào mừng quý khách đến với Website bán hàng của <a href="" class="content-shop">Qcshop</a>
        </p>
        <p class="content-text">
            Lời đầu tiên, <a href="" class="content-shop">Qcshop</a> xin phép được gửi tới quý khách hàng lời
            chúc sức khỏe, thành đạt và hạnh phúc.
        </p>
        <p class="content-text">
            Hiện tại <a href="" class="content-shop">Qcshop</a> đang kinh doanh các mẫu giày Sneaker Hot và là
            xu thế thời trang: Adidas, Nike,
            Converse, Balenciaga, Vans, … với chất lượng cải thiện liên tục để hoàn hảo nhất cho Quý khách hàng
            của mình.
        </p>
        <div class="content__img-bag">
            <img class="content__desription-img" src="{{ asset('client/image/9af84667e4f32dad74e2-770x1024.jpg') }}" alt="">
        </div>
        <h3 class="tite__content">Keds và Converses</h3>
        <p class="content-text-more">
            Keds là một trong những đôi giày đầu tiên được sản xuất hàng loạt ở Mĩ và chúng đã trở thành cơn sốt
            vào thời điểm đó.

            Về cơ bản những đôi giày cao su được ưu tiên sử dụng trong thể thao là vì sức bám của chúng với mặt
            sàn tốt hơn những đôi giày đế da.

            Nắm bắt được tình hình thị trường, những đôi giày mang nhãn hiệu Converse nhanh chóng xuất hiện
            theo.

            Vào năm 1917 họ trình làng đôi giày bóng rổ “All Star”. Khi đó thị trường giày còn chưa có nhiều
            cạnh tranh, dòng sản phẩm này của họ được xếp vào hàng đỉnh cao bởi thiết kế đặc biệt với những
            miếng vải mềm được sử dụng quanh khu vực mắt cá chân nhằm hạn chế tổn thương trong khi chơi.

            Năm 1920 vận động viên huyền thoại bóng rổ Chuck Taylor đã mang tất cả những kinh nghiệm bao năm của
            mình để thiết kế ra một đôi giày đặc biệt nhất.

            Thiết kế của ông gần như không bị thay đổi mấy trong cả thế kỷ qua, cho đến giờ nó vẫn là tượng đài
            bất hủ trong nền công nghiệp sản xuất giày.


        </p>
        <div class="content__img-bag">
            <img class="content__desription-img" src="{{ asset('client/image/Giày-sneaker-nike-air-force-trắng-đế-xanh.jpg') }}" alt="">
        </div>
        <h3 class="tite__content">Air Jordan</h3>
        <p class="content-text-more">
            Bắt đầu từ năm 1980, <a href="" class="content-shop">Qcshop</a> sneaker nhanh chóng đi từ giày dép
            thành một biểu tượng thời trang và những đôi
            giày sneaker hiện đại bắt đầu lên ngôi. Năm 1984 Nike đã hợp tác với <a href="" class="content-shop">Qcshop</a> của đội bóng
            Chicago Bulls là người mẫu hình ảnh cho công ty.

            Sau đó Air Jordan 1 đã ra đời và bản gốc của Jordan có màu đỏ và màu đen. Đôi Air Jordan 1 đã làm
            nổi bật <a href="" class="content-shop">Qcshop</a> giữa các thành viên còn lại của đội – hoàn toàn
            đi
            ngược lại quy định của
            hiệp hội bóng rổ.
        </p>
    </section>
    <section class="slide__bar">
        <div class="pages__relate">
            <h4 class="slider__bar-title">Bài viết liên quan</h4>
            <ul class="pages__relate-list">
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <img class="pages__relate-item-img" src="{{ asset('client/image/giày-nike-1.jpg ') }}" alt="">
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="">3
                                đôi giày sneaker HOT 2021 ai cũng
                                nên sở
                                hữu</a></span>
                </li>
            </ul>
            <h4 class="slider__bar-title">Sản phẩm mới nhất</h4>
            <ul class="product__relate-list">
                @foreach($productAll as $key)
                <li class="product__relate-item">
                    <div class="product__relate-img-bg">
                        <a href="{{ route('product.detail' , ['slug' => $key->slug]) }}"><img class="product__relate-img" src="{{ asset('client/image/'.$key->img) }}" alt=""></a>
                    </div>
                    <div class="product__relate-infor-bg">
                        <span class="product__relate-name"><a class="product__relate-name-a" href="">{{$key->name}}</a></span>
                        <div class="product__hot-list-infor-price">
                            <bdo dir="ltr"><?= number_format("$key->price", 0, ",", "."); ?>₫</bdo>
                            <span><?= number_format("$key->priceSale", 0, ",", "."); ?>₫</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

    </section>

</main>
@endsection