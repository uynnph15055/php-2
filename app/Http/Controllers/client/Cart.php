<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Cart extends Controller
{
    public function addCart(Request $request)
    {
        if (empty($request->size) || empty($request->quantity)) {
            return redirect()->back()->with('error', 'Size và số lượng đang trống !!!');
            die();
        } else {
            $rowProduct = Product::find($request->id);

            if (session()->exists('cart')) {
                $cart = session('cart');
                if (array_key_exists($request->id, $cart)) {
                    if (in_array($cart[$request->id]['size'], $cart[$request->id], true)) {
                        $cart[$request->id] = [
                            'id' => $request->id,
                            'name' => $rowProduct->name,
                            'img' => $rowProduct->img,
                            'size' => $cart[$request->id]['size'] . ',' . $request->size . '-' . 'SL :' . $request->quantity,
                            'price' => $rowProduct->priceSale,
                            'number' => $cart[$request->id]['number'] + $request->quantity,
                        ];
                    } else {
                        $cart[$request->id] = [
                            'id' => $request->id,
                            'name' => $rowProduct->name,
                            'img' => $rowProduct->img,
                            'size' => $request->size,
                            'price' => $rowProduct->priceSale,
                            'number' => $cart[$request->id]['number'] + $request->quantity,
                        ];
                    }
                } else {
                    $cart[$request->id] = [
                        'id' => $request->id,
                        'name' => $rowProduct->name,
                        'img' => $rowProduct->img,
                        'size' => $request->size . '-' . 'SL :' . $request->quantity,
                        'price' => $rowProduct->priceSale,
                        'number' => $request->quantity,
                    ];
                }
            } else {
                $cart = [];
                $cart[$request->id] = [
                    'id' => $request->id,
                    'name' => $rowProduct->name,
                    'img' => $rowProduct->img,
                    'size' => $request->size . '-' . 'SL :'  . $request->quantity,
                    'price' => $rowProduct->priceSale,
                    'number' => $request->quantity,
                ];
            }

            session()->put('cart',  $cart);
            return redirect()->back()->with('success',  'Thêm giỏ hàng thành công');
        }
    }

    public function index()
    {
        if (session()->exists('cart')) {
            $cart = session('cart');
        }

      

        // dd($cart);
        return view('client.cart', [
            'cart' => $cart,
        ]);
    }

    public function deleteCart($id)
    {
    }
}
