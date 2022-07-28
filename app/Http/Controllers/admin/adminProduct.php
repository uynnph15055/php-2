<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImgSub;
use App\Models\Product;
use Illuminate\Http\Request;

class adminProduct extends Controller
{
    public function index()
    {
        if (session()->exists('admin_info') == false) {
            return redirect()->intended('dang-ky-dang-nhap');
            die();
        }

        $products = Product::paginate(5);

        return view('admin.adminProduct.adminProduct', [
            'products' => $products,
        ]);
    }

    public function store()
    {
        $cateAll = $this->Hierarchical(Category::all(), 0, 0);
        return view('admin.adminProduct.addProduct',  [
            'cateAll' => $cateAll,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'price_sale' => 'required',
            'description' => 'required',
            'number_views' => 'required',
            'cate_id' => 'required',
            'size' => 'required',
            'img' => [
                'required',
                'image',
                'max:2048',
            ],
            'img_sub' => [
                'required',
            ],
        ], [
            'name.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'quantity.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'price.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'price_sale.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'description.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'number_views.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'cate_id.required' => 'Bạn chưa chọn danh mục !!!',
            'size.required' => 'Bạn chưa chọn size cho sản phẩm !!!',
            'img.required' => 'Bạn chưa chọn ảnh !!!',
            'img_sub.required' => 'Bạn chưa chọn ảnh phụ!!!',
        ]);

        // dd($request->all());

        $stringSize =  implode('|', $request->size);

        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientoriginalName();
            $file->move(public_path('upload'), $fileName);
        }

        $task =  Product::create(
            array_merge([
                'name' => $request->name,
                'slug' => $request->slug,
                'img' => $fileName,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'priceSale' => $request->price_sale,
                'cate_id' => $request->cate_id,
                'size' => $stringSize,
                'description' => $request->description,
                'number_views' => $request->number_views,
            ])
        );

        // Thêm ảnh phụ
        if ($request->hasFile('img_sub')) {
            $files = $request->file('img_sub');

            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('/upload'), $file_name);

                $modelImg = new ImgSub();
                $modelImg->product_id = $task->id;
                $modelImg->name = $file_name;
                $modelImg->save();
            }
        }

        session()->put('success', 'Thêm thành công');

        return redirect()->route('san-pham.index');
    }

    // Trang sửa
    public function edit($id)
    {
        $rowProducts = Product::find($id);
        // dd($rowProducts);

        $arraySize = explode('|', $rowProducts->size);
        // dd($arraySize);
        $cateAll = $this->Hierarchical(Category::all(), 0, 0);
        return view('admin.adminProduct.addProduct', [
            'cate' => $cateAll,
            'rowProduct' => $rowProducts,
            'dataSize' => $arraySize,
        ]);
    }

    // Sửa sản phẩm
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'price_sale' => 'required',
            'description' => 'required',
            'number_views' => 'required',
            'cate_id' => 'required',
        ], [
            'name.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'quantity.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'price.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'price_sale.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'description.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'number_views.required' => 'Bạn đang bỏ trống dữ liệu !!!',
            'cate_id.required' => 'Bạn chưa chọn danh mục !!!',
            'size.required' => 'Bạn chưa chọn size cho sản phẩm !!!',
        ]);

        $model = Product::find($request->id);


        $fileName = '';
        if ($request->has('img')) {
            $file = $request->img;
            $fileName = $file->getClientOriginalName();
            // dd($fileName);
            $file->move(public_path('upload'), $fileName);
        } else {
            $fileName = $model->img;
        }


        $model->img = $fileName;
        // Thêm ảnh phụ
        if ($request->hasFile('img_sub')) {
            $files = $request->file('img_sub');

            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('/upload'), $file_name);

                $modelImg = new ImgSub();
                $modelImg->product_id = $request->id;
                $modelImg->name = $file_name;
                $modelImg->save();
            }
        }

        $model->fill($request->all());
        $model->save();
        return redirect()->route('san-pham.index');
    }

    // Xóa sản phẩm

    public function destroy($id)
    {
        Product::find($id)->delete();
        session()->put('success', 'Xóa thành công !!!');
        return redirect()->route('san-pham.index');
    }
}
