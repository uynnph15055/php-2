<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class adminCate extends Controller
{
    public function index()
    {
        $dataAll = Category::all();
        $dataCateLimit = Category::orderBy('id', 'asc')->skip(0)->take(5)->get();

        $dataCateLimitDisplay = $this->Hierarchical($dataCateLimit, 0, 0);
        $dataCateAllDisplay = $this->Hierarchical($dataAll, 0, 0);
        $page = ceil(count($dataAll) / 5);

        return view('admin.adminCate.adminCate', [
            'dataCate' => $dataCateLimitDisplay,
            'dataParent' => $dataCateAllDisplay,
            'page' => $page,
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
