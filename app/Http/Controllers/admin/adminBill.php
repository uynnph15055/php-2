<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\client\Pay;
use App\Http\Controllers\Controller;
use App\Models\bill;
use App\Models\bill_detail;
use Illuminate\Http\Request;

class adminBill extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $billStatus = [
            '0' => 'Chưa thanh toán',
            '1' => 'Đã thanh toán',
            '2' => 'Đang giao',
        ];
        $dataBill = bill::paginate(5);
        return view('admin.adminBill.adminBill', [
            'dataBill' => $dataBill,
            'billStatus' => $billStatus,
        ]);
    }


    // Đổi trạng thái hóa đơn
    public function changStatus()
    {
        $status = $_GET['status'];
        $arrInfo = explode('-', $status);
        $model = bill::find($arrInfo[0]);
        $model->status = $arrInfo[1];
        $model->save();
    }

    public function detail($id)
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $billDetail = bill_detail::where('bill_details.bill_id', '=', $id)->get();
        // dd($billDetail);
        $infoCus =  bill::find($id);

        return view('admin.adminBill.billDetail', [
            'billDetail' => $billDetail,
            'inforCus' => $infoCus,
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = bill::find($id);
        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->address = $request->address;
        $model->save();
        return redirect()->back()->with('success', 'Thay đổi thành công');
    }
}
