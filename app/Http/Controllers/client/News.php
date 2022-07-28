<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\Product;
use Illuminate\Http\Request;

class News extends Controller
{
    public function index()
    {
        $post = post::skip(0)->take(6)->get();
        return view('client.news', [
            'post' => $post,
        ]);
    }

    public function newDetail($slug)
    {
        $postDetail = post::where('slug', '=', $slug)->get();
        $post = post::skip(0)->take(6)->get();
        $productAll = Product::orderBy('id', 'desc')->skip(0)->take(12)->get();
        return view('client.newDetail', [
            'productAll' => $productAll,
            'rowPost' => $postDetail[0],
            'post' => $post,
        ]);
    }
}
