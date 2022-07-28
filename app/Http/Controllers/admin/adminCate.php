<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class adminCate extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        // return '<h1>Uy</h1>';
        $dataLimit = Category::paginate(5);
        $dataAll = Category::all();

        $dataCateLimitDisplay = $this->Hierarchical($dataLimit, 0, 0);

        $dataCateAllDisplay = $this->Hierarchical($dataAll, 0, 0);

        return view('admin.adminCate.adminCate', [
            'dataCate' => $dataCateLimitDisplay,
            'dataParent' => $dataCateAllDisplay,
            'dataLimit' => $dataLimit,
        ]);
    }

    public function store(Request $request)
    {
        if (empty($request->name) || empty($request->slug)) {
            session()->put('error', 'Bạn đang bỏ trống dữ liệu !');
            return redirect()->intended('quan-tri/danh-muc');
            die();
        } else {
            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id
            ]);

            session()->put('success', 'Thêm thành công');
        }

        return redirect()->intended('quan-tri/danh-muc');
    }

    // Xóa danh mục
    public function destroy($id)
    {
        Category::find($id)->delete();
        session()->put('success', 'Xóa thành công !');
        return redirect()->intended('quan-tri/danh-muc');
    }
}
