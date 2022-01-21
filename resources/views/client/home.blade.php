@extends('client.layout.client')
@section('title' , 'Trang chủ')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/home.css') }}">
@endsection
@section('main_content')
<div class="banner padding__header">
    <div class="banner__wrap ">
        <img src="{{ asset('client/image/banner-shoes.jpg') }} " alt="" class="banner__big">
        <div class="banner__small-bag">
            <a href=""><img src="{{ asset('client/image/sals.jpg') }} " alt="" class="banner__small"></a>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div class="content">
    <section class="content__intro">
        <div class="content__intro-bag padding__header">
            <div class="content__intro-item">
                <img class="content__intro-img" src="{{ asset('client/image/productdetail-icon4.png') }} " alt="">
                <div class="content__intro-item-detail">
                    <h3 class="content__intro-detail-heading">Kiểm tra kỹ hàng</h3>
                    <p class="content__intro-detail-text">Trước khi thanh toán và nhận hàng</p>
                </div>
            </div>
            <div class="content__intro-item">
                <img class="content__intro-img" src="{{ asset('client/image/srv_2.png') }} " alt="">
                <div class="content__intro-item-detail">
                    <h3 class="content__intro-detail-heading">Đổi mới sản phẩm hoàn toàn</h3>
                    <p class="content__intro-detail-text">Nếu như Shop gửi nhầm size hoặc hàng lỗi do sản xuất
                    </p>
                </div>
            </div>
            <div class="content__intro-item">
                <img class="content__intro-img" src="{{ asset('client/image/srv_3.png') }} " alt="">
                <div class="content__intro-item-detail">
                    <h3 class="content__intro-detail-heading">Miễn phí vận chuyển</h3>
                    <p class="content__intro-detail-text">Miễn phí vận chuyển cho tất cả khách hàng trên toàn
                        quốc
                    </p>
                </div>
            </div>
        </div>
    </section>
    <main class="">
        <section class="product__hot padding__header">
            <div class="product__hot-heading">
                <img class="product__heading-img" src="{{ asset('client/image/icon-sale.png') }} " alt="">
                <h2 class="content-title">Sản phẩm HOT</h2>
            </div>
            <div class="product__hot-list">
                @foreach($productLotOfView as $key)
                <div class="product__hot-list-item">
                    <a href="{{ route('product.detail' , ['slug' => $key->slug]) }}">
                        <div class="product__hot-list-detail">
                            <div class="product__hot-list-img-bag">
                                <a href="{{ route('product.detail' , ['slug' => $key->slug]) }}"><img class="product__hot-list-detail-img" src="{{ asset('upload/'.$key->img) }} " alt=""></a>
                            </div>
                            <div class="product__hot-list-infor">
                                <a href="" class="product__hot-list-infor-name">
                                    {{$key->name}}
                                </a>
                                <div class="product__hot-list-infor-price">
                                    <bdo dir="ltr"> {{$key->price}}₫</bdo>
                                    <span>{{$key->priceSale}}₫</span>
                                </div>
                                <button class="product__hot-list-infor-btn">Chọn mẫu</button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        <section class="product__all-bg">
            <div class="product__all-heading">
                <h2 class="content-title content-title-sub">Một số sản phẩm</h2>
            </div>
            <div class="product__all">
                <div class="product__all-cate">
                    <ul class="product__all-cate-list">
                        @foreach($productCate as $key)
                        <li data-id="{{$key->id}}" class="product__all-cate-item">
                            <a href="" class="product__all-cate-item-link">{{$key->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="product__all-list-bg">
                    <div class="product__all-list">
                        @foreach($productAll as $key)
                        <div class="product__all-list-item">
                            <img class="" style="margin-bottom: 10px;" src="{{ asset('upload/'.$key->img) }} " alt="">
                            <a href="" class="btn__view">Chọn mẫu</a>
                            <span class="percent_sale">-20%</span>
                            <span class="product__all-name"><a href="">{{$key->name}}</a></span>
                            <div class="product__hot-list-infor-price">
                                <bdo dir="ltr"><?= number_format("$key->price", 0, ",", "."); ?>₫</bdo>
                                <span><?= number_format("$key->priceSale", 0, ",", ".") ?>₫</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <a href="" class="read__more-product">Xem tất cả sản phẩm</a>
            </div>
        </section>
        <section class="pages">
            <div class="product__all-heading">
                <h2 style="margin-top: 20px;" class="content-title content-title-sub hr__bottom">Đánh Giá -
                    Khách hàng</h2>
            </div>
            <div class="slider__frame">
                <div class="slider__assess">
                    <div class="slider__content">
                        <div class="slider__content-bg">
                            <div class="slider__content-info">
                                <img class="slider__content-img" src="{{ asset('client/image/unnamed.jpg') }} " alt="">
                                <h3>Uy nguyễn</h3>
                            </div>
                            <div class="slider__content-text">
                                <div class="slider__content-text-bg">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider__content-p"> Lorem ipsum dolor sit amet consectetur
                                        adipisicing
                                        elit. Maxime laboriosam
                                        iure
                                        impedit ipsum quaerat laudantium dolore alias, eum recusandae esse
                                        temporibus,
                                        consectetur illo dicta saepe iste delectus, officiis repudiandae
                                        debitis!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__content">
                        <div class="slider__content-bg">
                            <div class="slider__content-info">
                                <img class="slider__content-img" src="{{ asset('client/image/unnamed.jpg') }} " alt="">
                                <h3>Uy nguyễn</h3>
                            </div>
                            <div class="slider__content-text">
                                <div class="slider__content-text-bg">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider__content-p"> Lorem ipsum dolor sit amet consectetur
                                        adipisicing
                                        elit. Maxime laboriosam
                                        iure
                                        impedit ipsum quaerat laudantium dolore alias, eum recusandae esse
                                        temporibus,
                                        consectetur illo dicta saepe iste delectus, officiis repudiandae
                                        debitis!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider__content">
                        <div class="slider__content-bg">
                            <div class="slider__content-info">
                                <img class="slider__content-img" src="{{ asset('client/image/unnamed.jpg') }} " alt="">
                                <h3>Uy nguyễn</h3>
                            </div>
                            <div class="slider__content-text">
                                <div class="slider__content-text-bg">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="slider__content-p"> Lorem ipsum dolor sit amet consectetur
                                        adipisicing
                                        elit. Maxime laboriosam
                                        iure
                                        impedit ipsum quaerat laudantium dolore alias, eum recusandae esse
                                        temporibus,
                                        consectetur illo dicta saepe iste delectus, officiis repudiandae
                                        debitis!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $('.product__all-cate-item').click(function(e) {
            e.preventDefault();
            var cate = $(this).data('id');
            $.get("<?= route('home.paging') ?>", {
                cate_id: cate
            }, function($data) {
                $('.product__all-list').html($data);
            })
        })
    });

</script>
@endsection