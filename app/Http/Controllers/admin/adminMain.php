<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class adminMain extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $chart = Category::select('categories.name',
         Product::raw("COUNT(products.cate_id) as number_cate"))
         ->join('products', 'products.cate_id', '=', 'categories.id')
         ->groupBy("products.cate_id", "categories.name")->get();


        dd($chart);
        // return $chart;
        
        return view('admin.adminMain.adminMain', [
            'chart' => $chart,
        ]);
    }
}
