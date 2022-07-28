@extends('client.layout.client')
@section('title' , 'Tin tức')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/new.css') }}">
@endsection
@section('main_content')
<main>
    <marquee class="info_shop" width="100%" direction="left">
        <p style="font-style: italic;">Trở lại với đường đua thời trang, Aristino mang đến thiết kế
            sơ mi
            trắng White Lotus gói trọn nét đẹp văn hóa truyền thống trong một thiết kế hiện đại đầy tinh
            tế. Đây là chiếc áo không thể thiếu của quý ông trên hành trình chinh phục thành công.
            Là một thương hiệu nội địa nhưng luôn mang trong mình giấc mơ vươn tầm thế giới, Aristino đã
            và đang hiện thực hóa mục tiêu này bằng những bước chuyển mình cụ thể và đầy .</p>
    </marquee>
    <div class="content">
        <h2 class="content_title">TIN TỨC - MỚI NHẤT</h2>
        <div class="wrap__list-news">
            @foreach($post as $key)
            <a href="{{ route('new.detail' , ['slug' => $key->slug]) }}">
                <div class="wrap__new-item">
                    <div class="wrap__new-item-img">
                        <a href="{{ route('new.detail' , ['slug' => $key->slug]) }}"><img src="{{asset('upload/'. $key->img)}}" alt=""></a>
                        <div class="news_infor-date">
                            <h3 class="news_infor-day">18</h3>
                            <h4 class="news_infor-month">THG 06</h4>
                        </div>
                    </div>
                    <h4 class="news__title">{{$key->title}}</h4>
                    <p>Mặc dù hiện tại đại dịch Covid trên toàn cầu vẫn đang lây lan rất phức tạp nhưng các
                        thương...</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</main>
@endsection