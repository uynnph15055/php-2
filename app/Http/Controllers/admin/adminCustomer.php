<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class adminCustomer extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $customer = customer::paginate(5);
        return view('admin.adminCustomer.adminCustomer', [
            'customer' => $customer,
        ]);
    }

    public function delete($id)
    {
        customer::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
