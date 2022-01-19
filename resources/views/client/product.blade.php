<!-- Content -->
@extends('client.layout.client')
@section('title' , 'Sản phẩm')
@section('linkCss')
<link rel="stylesheet" href="{{ asset('client/Css/product.css') }}">
@endsection
@section('main_content')
<div class="content">
    <div class="content_header padding__header">
        <ul class="position_page">
            <li><a href="">Trang chủ /</a></li>
            <li><a href="">Sản phẩm</a></li>
        </ul>
        <div class="filter_product-bg">
            <p class="sum__product-page">Showing 1–40 of 114 results</p>
            <select class="filter__product" name="" id="">
                <option value="">Mới nhất</option>
                <option value="">Theo giá : từ cao đến thấp</option>
                <option value="">Theo giá : từ thấp đến cao</option>
            </select>
        </div>
    </div>
    <div class="content_list">
        <div class="product_cate-bg">
            <h4 class="product_cate-title">Danh mục sản phẩm</h4>
            <ul class="product__cate-list">
                <li class="product__cate-item"><a href="" class="product__cate-link">Dr Martens</a></li>
                <li class="product__cate-item"><a href="" class="product__cate-link">Dr Martens</a></li>
                <li class="product__cate-item"><a href="" class="product__cate-link">Dr Martens</a></li>
                <li class="product__cate-item"><a href="" class="product__cate-link">Dr Martens</a></li>
                <li class="product__cate-item"><a href="" class="product__cate-link">Dr Martens</a></li>
            </ul>
        </div>
        <div class="product__all-list-bg">
            <div class="product__all-list">
                @foreach($productAll as $key)
                <div class="product__all-list-item">
                    <img class="" src=" {{ asset('client/image/'.$key->img) }}" alt="">
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
            <ul class="page__paging-list">
                <li class="page__paging-item"><a href="">1</a></li>
                <li class="page__paging-item"><a href="">2</a></li>
                <li class="page__paging-item"><a href="">3</a></li>
                <li class="page__paging-item"><a href="">4</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection