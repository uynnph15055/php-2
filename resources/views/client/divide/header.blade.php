<header class="header">
    <div class="header__top padding__header">
        <p class="header__top-contact">
            Qcshop - Shop giày Sneaker chất lượng
        </p>
        <p class="time__word">
            <i class="far fa-clock"></i>
            08:00 - 20:00
        </p>
        <p class="header__top-contact">
            <i class="fas fa-map-marker-alt"></i>
            KTX Mỹ Đình, Mỹ Đình II, Nam Từ Liêm, Hà Nội
        </p>
    </div>
    <div class="header__body padding__header">
        <a href="
                "><img src="{{ asset('client/image/logo2.png') }}" alt="" class="header__body-logo">
        </a>
        <div class="header__body-input">
            <input class="header__body-search-input" type="text" placeholder="Tìm kiếm sản phẩm ... ">
        </div>
        <div class="header__body-search">
            <button class="header__body-search-btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="header__body-phone">
            <i class="fas fa-phone-alt"></i>
            <div class="header__body-phone-infor">
                <span class="header__body-phone-infor-label">Gọi tư vấn</span>
                <br>
                <span class="header__body-phone-infor-number">0349 791 128</span>
            </div>
        </div>
        <a href="" class="header__body-cart" style="text-decoration: none;">
            <h5 class="header__body-cart-money">250.000 <span>đ</span></h5>
            <i class="fas fa-shopping-cart"></i>
            <div class="count__cart">
                1
            </div>
        </a>
    </div>
    <!--  -->
    <div class="header__main">
        <ul class="header__main-list">
            <li class="header__main-list-item header__main-list-item-home">
                <a href="{{ route('home') }}" class="header__main-list-link">Trang chủ</a>
            </li>
            <li class="header__main-list-item">
                <a href="{{ route('intro') }}" class="header__main-list-link">Giới Thiệu</a>
            </li>
            <li class="header__main-list-item">
                <a href="{{ route('product') }}" class="header__main-list-link menu__product-list">Sản phẩm <i class="fas fa-angle-down"></i></a>
                <ul class="menu__product-chird-list">
                    <li class="menu__product-chird-item"><a href="">
                            Giầy Nike
                        </a></li>
                    <li class="menu__product-chird-item"><a href="">Giầy Aridass</a></li>
                    <li class="menu__product-chird-item"><a href="">Giầy Nike</a></li>
                </ul>
            </li>
            <li class="header__main-list-item">
                <a href="" class="header__main-list-link">Bài Viết</a>
            </li>
            <li class="header__main-list-item">
                <a href="{{ route('contact') }}" class="header__main-list-link">Liên Hệ</a>
            </li>
        </ul>
        @if(session()->exists('user_info'))
        <ul class="info-user">
            <li><a href=""> <img class="img_user" src="{{ asset('upload/'.session('user_info')->img) }}" alt=""></a></li>
            <li><a href="">{{session('user_info')->name}}</a></li>
            <li><a href="{{ route('logOut') }}">| Đăng xuất</a></li>
        </ul>
        @else
        <ul class="info-user">
            <li><a href="{{ route('formRegister') }}">Đăng nhập</a></li>
            <li><a href="{{ route('formRegister') }}">| Đăng ký</a></li>
        </ul>
        @endif
    </div>
</header>