<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\judge;
use App\Models\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $productLotOfView = Product::orderBy('number_views', 'desc')->skip(0)->take(6)->get();
        $productCate = Category::orderBy('id', 'desc')->skip(1)->take(5)->get();
        $productAll = Product::orderBy('id', 'desc')->skip(0)->take(20)->get();
        $assessCustomer = judge::where('status', '=', 0)->skip(0)->take(3)->get();
        // dd($assessCustomer);

        return view('client.home', [
            'productLotOfView' => $productLotOfView,
            'productCate' => $productCate,
            'productAll' => $productAll,
            'assessCustomer' => $assessCustomer,
        ]);
    }

    public function pagingCate()
    {
        $id = $_GET['cate_id'];
        $productWhereCate = Product::where('cate_id', '=', $id)->get();
        foreach ($productWhereCate as $key) {
            $price = number_format($key->price, 0, ",", ".");
            $priceSale = number_format($key->priceSale, 0, ",", ".");
            $img = asset('client/image/' . $key->img);
            echo "
            <div class='product__all-list-item'>
            <img class=' style='margin-bottom: 10px;' src='" . $img . "' alt=''>
            <a href='' class='btn__view'>Chọn mẫu</a>
            <span class='percent_sale'>-20%</span>
            <span class='product__all-name'><a href=''>" .  $key->name . "</a></span>
            <div class='product__hot-list-infor-price'>
                <bdo dir='ltr'>" . $price . " ₫</bdo>
                <span>" . $priceSale . "₫</span>
            </div>
        </div>
            ";
        };
    }
}
