@extends('client.layout.client')
@section('title' , 'Chi tiết bài viết')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/desription.css') }}">
<link rel="stylesheet" href="{{ asset('client/Css/sliderbar.css') }}">
@endsection
<style>
    .title {
        font-size: 27px;
        font-weight: normal;
    }

    .description {
        margin: 10px 0px;
        line-height: 1.6;
    }
</style>
@section('main_content')
<main class="main__bg">
    <section class="content">
        <h3 class="title">{{$rowPost->title}}</h3>
        <p class="description">{{$rowPost->description}}</p>
        <?php echo $rowPost->content ?>
    </section>
    <section class="slide__bar">
        <div class="pages__relate">
            <h4 class="slider__bar-title">Bài viết liên quan</h4>
            <ul class="pages__relate-list">
                @foreach($post as $key)
                <li class="pages__relate-item">
                    <div class="pages__relate-img-bg">
                        <a href="{{route('new.detail' , ['slug' => $key->slug])}}"> <img class="pages__relate-item-img" src="{{ asset('upload/' . $key->img) }}" alt=""></a>
                    </div>
                    <div class="pages__relate-infor-bg">
                        <span class="pages__relate-infor-name"><a class="pages__relate-infor-name-a" href="{{route('new.detail' , ['slug' => $key->slug])}}">{{$key->title}}</a></span>
                </li>
                @endforeach
            </ul>
            <h4 class="slider__bar-title">Sản phẩm mới nhất</h4>
            <ul class="product__relate-list">
                @foreach($productAll as $key)
                <li class="product__relate-item">
                    <div class="product__relate-img-bg">
                        <a href="{{ route('product.detail' , ['slug' => $key->slug]) }}"><img class="product__relate-img" src="{{ asset('client/image/'.$key->img) }}" alt=""></a>
                    </div>
                    <div class="product__relate-infor-bg">
                        <span class="product__relate-name"><a class="product__relate-name-a" href="{{ route('product.detail' , ['slug' => $key->slug]) }}">{{$key->name}}</a></span>
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