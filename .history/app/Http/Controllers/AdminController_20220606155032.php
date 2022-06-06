<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\ProductCategory;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Property;

class AdminController extends Controller
{

    public function getDanhSachSlide()
    {
        $slide = Slide::all();
        return view('admin.Slide.DanhSach', ['slide' => $slide]);
    }

    public function getThemSlide()
    {
        return view('admin.Slide.Them');
    }

    public function postThemSlide(Request $request)
    {
        $slide = new Slide();
        $slide->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move("source/image/home", $name);
            $slide->image = $name;
        } else {
            echo "Chưa có file";
        }
        $slide->tittle = $request->tittle;
        $slide->content = $request->content;
        $slide->link = $request->link;
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaSlide($id)
    {
        $slide = Slide::find($id);
        return view('admin.Slide.Sua', ['slide' => $slide]);
    }

    public function postSuaSlide(Request $request, $id)
    {
        $slide = Slide::find($id);
        $slide->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source/image/home', $name);
            $slide->image = $name;
        } else {
            echo "Chưa có file";
        }
        $slide->tittle = $request->tittle;
        $slide->content = $request->content;
        $slide->link = $request->link;
        $slide->save();
        return redirect('admin/slide/sua/' . $id)->with('thongbao', 'Sửa Thành Công');
    }

    public function getXoaSlide($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao', 'Xoá Thành Công');
    }





    /* <-----------------------------------------------------Type Product ----------------------------------------- */

    public function getDanhSachTypeProduct()
    {
        $type = ProductType::all();
        return view('admin.ProductType.DanhSach', ['type' => $type]);
    }

    public function getThemTypeProduct()
    {
        $category = ProductCategory::all();
        return view('admin.ProductType.them', ['category' => $category]);
    }

    public function postThemTypeProduct(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn Chưa Nhập Tên Loại Sản Phẩm',
            ]
        );

        $type = new ProductType();
        $type->name = $request->name;
        $type->id_category = $request->id_category;
        $type->save();
        return redirect('admin/TypeProduct/them')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaTypeProduct($id)
    {
        $category = ProductCategory::all();
        $type = ProductType::find($id);
        return view('admin.ProductType.Sua', ['type' => $type, 'category' => $category]);
    }

    public function postSuaTypeProduct(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn Chưa Nhập Tên Danh Mục',
            ]
        );
        $type = ProductType::find($id);
        $type->name = $request->name;
        $type->id_category = $request->id_category;
        $type->save();
        return redirect('admin/TypeProduct/sua/' . $id)->with('thongbao', 'Sửa Thành Công');
    }

    public function getXoaTypeProduct($id)
    {
        $type = ProductType::find($id);
        $type->delete();

        return redirect('admin/TypeProduct/danhsach')->with('thongbao', 'Xoá Thành Công');
    }

    /* <-----------------------------------------------------CategoryProduct----------------------------------------- */

    public function getDanhSachCategoryProduct()
    {
        $category = ProductCategory::all();
        return view('admin.ProductCategory.DanhSach', ['category' => $category]);
    }

    public function getThemCategoryProduct()
    {
        return view('admin.ProductCategory.them');
    }

    public function postThemCategoryProduct(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn Chưa Nhập Tên Danh Mục',
            ]
        );

        $category = new ProductCategory();
        $category->name = $request->name;
        $category->save();
        return redirect('admin/CategoryProduct/them')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaCategoryProduct($id)
    {
        $category = ProductCategory::find($id);
        return view('admin.ProductCategory.Sua', ['category' => $category]);
    }

    public function postSuaCategoryProduct(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn Chưa Nhập Tên Danh Mục',
            ]
        );
        $category = ProductCategory::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('admin/CategoryProduct/sua/' . $id)->with('thongbao', 'Sửa Thành Công');
    }

    public function getXoaCategoryProduct($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();

        return redirect('admin/CategoryProduct/danhsach')->with('thongbao', 'Xoá Thành Công');
    }

    /* <-----------------------------------------------------Product----------------------------------------- */

    public function getDanhSachProduct()
    {
        $product = Product::all();
        return view('admin.Product.DanhSach', ['product' => $product]);
    }

    public function getThemProduct()
    {
        $category = ProductCategory::all();
        $type = ProductType::all();
        return view('admin.Product.Them', ['category' => $category, 'type' => $type]);
    }

    public function postThemProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source\image\product', $name);
            $product->image = $name;
        } else {
            echo "Chưa Có File";
        }
        $product->new = $request->new;
        $product->save();
        return redirect('admin/Product/them')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaProduct(Request $request, $id)
    {
        $type = ProductType::all();
        $product = Product::find($id);
        return view('admin.Product.Sua', ['product' => $product, 'type' => $type]);
    }

    public function postSuaProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source\image\product', $name);
            $product->image = $name;
        } else {
            echo "Chưa Có File";
        }
        $product->new = $request->new;
        $product->save();
        return redirect('admin/Product/sua/' . $id)->with('thongbao', 'Sửa Thành Công');
    }

    public function getXoaProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/Product/danhsach')->with('thongbao', 'Xoá Thành Công');
    }

    /* <-----------------------------------------------------User----------------------------------------- */

    public function getDanhSachUser()
    {
        $users = User::where();
        return view('admin.User.DanhSach', ['users' => $users]);
    }

    public function getThemUser()
    {
        $category = ProductCategory::all();
        $type = ProductType::all();
        return view('admin.Product.Them', ['category' => $category, 'type' => $type]);
    }

    public function postThemUser(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source\image\product', $name);
            $product->image = $name;
        } else {
            echo "Chưa Có File";
        }
        $product->new = $request->new;
        $product->save();
        return redirect('admin/Product/them')->with('thongbao', 'Thêm Thành Công');
    }

    public function getSuaUser(Request $request, $id)
    {
        $type = ProductType::all();
        $product = Product::find($id);
        return view('admin.Product.Sua', ['product' => $product, 'type' => $type]);
    }

    public function postSuaUser(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('source\image\product', $name);
            $product->image = $name;
        } else {
            echo "Chưa Có File";
        }
        $product->new = $request->new;
        $product->save();
        return redirect('admin/Product/sua/' . $id)->with('thongbao', 'Sửa Thành Công');
    }

    public function getXoaUser($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/Product/danhsach')->with('thongbao', 'Xoá Thành Công');
    }
}
