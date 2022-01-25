<!-- Content -->
@extends('client.layout.client')
@section('title' , 'Chi tiết sản phẩm')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/productDetail.css') }}">
<link rel="stylesheet" href="{{ asset('client/Css/sliderbar.css') }}">
<link rel="stylesheet" href="{{ asset('client/Css/tab.css') }}">
@endsection
@section('main_content')
<main class="content-bg">
    <div class="content">
        <section class="product__info-bg">
            <div class="product__detail">
                <div class="product__img-bg">
                    <div class="product__img-big">
                        <img class="product__img" src="{{ asset('upload/'.$rowProduct->img) }} " alt="">
                    </div>
                    <div class="product_img-sub">
                        <div class="images">
                            @foreach($imgSub as $key)
                            <img src="{{ asset('upload/'.$key->name) }} " alt="Mẫu 1" />
                            @endforeach
                        </div>
                        <div class="modal">
                            <span class="close"><i class="fas fa-times"></i></span>
                            <div class="modalContent">
                                <img src="" class="modalImg" />
                                <span class="modalTxt"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product__info-bg" style="padding-right: 20px;">
                    <ul class="product__link-list">
                        <li class="product__link-item"><a href="{{ route('home') }}">Trang chủ</a> /</li>
                        <li class="product__link-item"><a href="{{ route('product') }}">Sản phẩm</a> /</li>
                        <li class="product__link-item"><a href="">Giầy nike</a> /</li>
                        <li class="product__link-item"><a href="">Nike Air Force</a></li>
                    </ul>
                    <h2 class="product__name">{{$rowProduct->name}}</h2>
                    <div class="product__price">
                        <h3 class="price__sale"><?= number_format("$rowProduct->price", 0, ",", "."); ?> <span class="d">đ</span></h3>
                        <h2 class="price__main"><?= number_format("$rowProduct->priceSale", 0, ",", "."); ?> <span class="d">đ</span></h2>
                        <span class="free__ship">( Miễn phí giao hàng )</span>
                    </div>
                    <p class="product__description">
                        ✓ Hàng: Replica 1
                        <br>
                        ✓ Ảnh sản phẩm chụp trực tiếp
                        <br>
                        ✓ Miễn phí ship hoàn toàn tất cả các sản phẩm, tất cả các tỉnh thành
                        <br>
                        ✓ Nhận hàng sau 1 – 3 ngày kể từ ngày đặt hàng
                        <br>
                        ✓ Nội thành Hà Nội nhận hàng trong 12 giờ
                        <br>
                        ✓ Shop cam kết chất lượng của sản phẩm tương đương với số tiền bạn bỏ ra
                        <br>
                        ✓ Nhận hàng và kiểm tra trước khi thanh toán
                        <br>
                        ✓ Shop cam kết đổi mới hoàn toàn sản phẩm nếu lỗi do sản xuất: bong keo, sứt chỉ,
                        <br>
                        xước…(phí ship 2 chiều Shop chịu hoàn toàn)
                        ✓ Shop cam kết hoàn tiền 110% nếu như sản phẩm không làm khách hàng hài lòng
                        <br>
                    </p>
                    <span class="product__choose-size">Chọn size</span>
                    <form action="{{ route('addCart') }}" method="POST">
                        @csrf
                        <input type="text" class="input2" hidden value="{{$rowProduct->id}}" name="id">
                        <div class="product__size-radio">
                            @foreach($size as $key => $value)
                            <input type="radio" class="input2" value="{{$value}}" name="size" id="{{$value}}">
                            <label class="label2" for="{{$value}}">{{$value}}</label>
                            @endforeach
                        </div>
                        <div class="product__input-number">
                            <input value="1" class="input-number" name="quantity" type="number">
                        </div>
                        <button class="btn-add-cart">Thêm vào giỏ hàng</button>
                    </form>
                    <div class="contact-social">
                        <a class="mess mess__face" href="">Chat facebook</a>
                        <a class="mess mess__zalo" href="">Chat Zalo </a>
                    </div>
                </div>
            </div>
            <div class="product_tab">
                <div class="tab">
                    <button id="defaultOpen" class="tablinks tablinks__sub" onclick="openCity(event, 'London')">Liên
                        quan</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Bình luận</button>
                </div>

                <div id="London" class="tabcontent">
                    <ul class="product__footer">
                        @foreach($productRelate as $key)
                        <li class="product__footer-item">
                            <a href="">
                                <img src="{{ asset('upload/' . $key->img) }}" alt="">
                            </a>
                            <p>{{$key->name}}</p>
                            <div class="product__hot-list-infor-price">
                                <bdo dir="ltr"><?= number_format("$key->price", 0, ",", "."); ?>₫</bdo>
                                <span><?= number_format("$key->priceSale", 0, ",", "."); ?>₫</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div id="Paris" class="tabcontent">
                    @if(session()->exists('user_info'))
                    <div class="info_user">
                        <img src="{{ asset('upload/'. session('user_info')->img)}}" alt="">
                        <div class="info_user-detail">
                            <h4>{{ session('user_info')->name }}</h4>
                            <span>{{session('user_info')->email}}</span>
                        </div>
                    </div>
                    <div class="stars">
                        <form action="{{ route('product.saveAssess') }}" method="POST">
                            @csrf
                            <div class="star-bg">
                                <input class="star star-5 input" value="{{ $rowProduct->id }}" type="number" name="product_id" />
                                <input class="star star-5 input" value="1" id="star-5" type="radio" name="star[]" />
                                <label class="star star-5 label" for="star-5"></label>
                                <input class="star star-4 input" value="2" id="star-4" type="radio" name="star[]" />
                                <label class="star star-4 label" for="star-4"></label>
                                <input class="star star-3 input" value="3" id="star-3" type="radio" name="star[]" />
                                <label class="star star-3 label" for="star-3"></label>
                                <input class="star star-2 input" value="4" id="star-2" type="radio" name="star[]" />
                                <label class="star star-2 label" for="star-2"></label>
                                <input class="star star-1 input" value="5" id="star-1" type="radio" name="star[]" />
                                <label class="star star-1 label" for="star-1"></label>
                            </div>
                            <textarea class="feedback-container" id="" cols="30" style="font-size: 20px;" rows="10" name="content">
                                        </textarea>
                            <div class="btn-feedback">
                                <button class="btn-primary" style="cursor: pointer;">
                                    Gửi đánh giá
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="warning-login">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>Bạn chưa đăng nhập tài khoản !!!</h3>
                    <br>
                    <a href="{{route('formRegister')}}">Đăng nhập</a>
                </div>
                @endif
            </div>
        </section>
        <section class="product__relate">
            <ul class="product__relate-list">
                @foreach($productSlider as $key)
                <li class="product__relate-item">
                    <div class="product__relate-img-bg">
                        <a href=""><img class="product__relate-img" src="{{asset('upload/'. $key->img)}}" alt=""></a>
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
        </section>
    </div>
</main>
<script src="{{ asset('client/js/tab.js') }}"></script>
<script src="{{ asset('client/js/modalPictrure.js') }}"></script>
@endsection