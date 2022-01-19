<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function index()
    {
        $productAll = ModelsProduct::orderBy('id', 'desc')->skip(0)->take(20)->get();
        return view('client.product', [
            'productAll' => $productAll,
        ]);
    }
}
