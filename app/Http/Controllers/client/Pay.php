<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\bill_detail;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class Pay extends Controller
{
    // Chuyển đến trang thanh toán
    public function index()
    {
        if (session()->exists('user_info')) {
            $userInfo = session('user_info');
        } else {
            return redirect()->route('formRegister')->with('error', 'Bạn cần đăng nhập trước khi thanh toán !!!');
        }

        if (session()->exists('cart')) {
            $cart = session('cart');
        }

        return view('client.pay', [
            'user_info' => $userInfo,
            'cart' => $cart,
        ]);
    }

    // Lưu hóa đơn chi tiết
    public function storeBill(Request $request)
    {
        $customer = session('user_info');
        $customer_id = $customer->id;

        $dateReceipt =  date('Y-m-d', strtotime(' + 3 days'));
        // dd($dataReceipt);
        // ['customer_id', 'name', 'address', 'phone', 'date_receipt', 'address_detail', 'type_pay', 'note'];
        $task =  bill::create(
            array_merge([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'address_detail' => $request->address_detail,
                'type_pay' => $request->type_pay,
                'note' => $request->note,
                'date_receipt' => $dateReceipt,
                'customer_id' => $customer_id,
            ])
        );

        if (session()->exists('cart')) {
            $cart = session('cart');
            foreach ($cart as $key) {
                $modelBillDetail = new bill_detail();
                $modelBillDetail->product_id = $key['id'];
                $modelBillDetail->bill_id = $task->id;
                $modelBillDetail->quantity = $key['number'];
                $modelBillDetail->size = $key['size'];
                $modelBillDetail->save();
            }
        }

        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công');
    }
}
