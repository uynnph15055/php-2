<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImgSub;
use App\Models\judge;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class Product extends Controller
{
    // public $customer_id;

    // function __construct()
    // {
    //     if (session()->exists('user_info')) {
    //         $this->customer_id = session('user_info')->id;
    //     }
    // }

    public function index()
    {
        $productAll = ModelsProduct::orderBy('id', 'desc')->skip(0)->take(20)->get();
        $category = Category::all();
        return view('client.product', [
            'productAll' => $productAll,
            'category' => $category,
        ]);
    }

    // Hàm dùng chung rander ajax
    function render($data)
    {
        foreach ($data as $key) {
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
        }
    }

    public function pagingCate()
    {
        $id = $_GET['cate_id'];
        $productWhereCate = ModelsProduct::where('cate_id', '=', $id)->get();
        $this->render($productWhereCate);
    }

    public function pagingFilter()
    {
        $filter_id = $_GET['filter_id'];
        if ($filter_id == 1) {
            $productAll = ModelsProduct::orderBy('id', 'desc')->skip(0)->take(20)->get();
            $this->render($productAll);
        } else if ($filter_id == 2) {
            $productAll = ModelsProduct::orderBy('priceSale', 'desc')->skip(0)->take(20)->get();
            $this->render($productAll);
        } else {
            $productAll = ModelsProduct::orderBy('priceSale', 'asc')->skip(0)->take(20)->get();
            $this->render($productAll);
        }
    }

    // Trang sản phẩm chi tiết
    public function productDetail($slug)
    {
        $productDetail = ModelsProduct::where('slug', '=', $slug)->get();
        $imgSub = ImgSub::where('product_id', '=', $productDetail[0]->id)->get();
        $productSlider = ModelsProduct::orderBy('id', 'desc')->skip(0)->take(11)->get();
        $productRelate = ModelsProduct::where('cate_id', '=', $productDetail[0]->cate_id)->skip(0)->take(4)->get();
        $arraySize = explode('|', $productDetail[0]->size);
        // dd($arraySize);
        return view('client.productDetail', [
            'rowProduct' => $productDetail[0],
            'imgSub' => $imgSub,
            'productSlider' => $productSlider,
            'productRelate' => $productRelate,
            'size' => $arraySize,
        ]);
    }

    public function saveAssess(Request $request)
    {
        // dd('Uy');
        if (empty($request->content) || empty($request->star)) {
            session()->put('error', 'Chưa có dữ liệu vào !!!');
            return redirect()->back();
            die();
        } else {
            // dd($request->star);

            $number_star = 0;
            if ($request->star[0] == 1) {
                $number_star = 5;
            } elseif ($request->star[0] == 2) {
                $number_star = 4;
            } elseif ($request->star[0] == 3) {
                $number_star = 3;
            } elseif ($request->star[0] == 4) {
                $number_star = 2;
            } else {
                $number_star = 1;
            }

            // dd($this->customer_id);
            $customer_id = 0;
            if (session()->exists('user_info')) {
                $customer_id = session('user_info')->id;
            }

            // dd($customer_id);
            $model = new judge();
            $model->product_id = $request->product_id;
            $model->customer_id = $customer_id;
            $model->number_star = $number_star;
            $model->content = $request->content;
            $model->save();

            return redirect()->back()->with('success', 'Đã lưu đánh giá của bạn !!!');
        }
    }
}
