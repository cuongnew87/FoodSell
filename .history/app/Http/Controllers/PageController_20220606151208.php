<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Product;
use App\ProductCategory;
use App\ProductType;
use App\Review;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function __construct()
    {
        $slide = Slide::all();
        $category = ProductCategory::all();
        $productRemain = Product::inRandomOrder()->paginate(3);
        $productRemain1 = Product::inRandomOrder()->paginate(3);
        $product_new = Product::where('new',1)->paginate(3);
        $product = Product::inRandomOrder()->paginate(6);

        view()->share('product',$product);
        view()->share('product_new',$product_new);
        view()->share('slide', $slide);
        view()->share('category',$category);
        view()->share('productRemain', $productRemain);
        view()->share('productRemain1', $productRemain1);
    }
   public function getTrangChu(){
       return view('page.trangchu');
   }

   public function getThanhToan(Request $request){
     $user = User::where('id',Session::get('id_user'))->first();
     $total = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.id','cart.soluong','cart.thanhtoan')->sum('cart.thanhtoan');
    return view('page.ThanhToan',['user'=>$user,'total'=>$total]);
   }

   public function postThanhToan(Request $request)
   {
       $product_bill = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.id','cart.id_user','cart.id_sanpham','cart.soluong','cart.thanhtoan','cart.created_at','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
       ->get();

       foreach($product_bill as $product_bill)
       {
           $bill = new Bill();
           $bill->id_user = $product_bill->id_user;
           $bill->id_sanpham = $product_bill->id_sanpham;
           $bill->soluong = $product_bill->soluong;
           $bill->total = $product_bill->thanhtoan;
           $bill->note = $request->messenge;
           $bill->payment = $request->method_payment;
           $bill->save();
       }
       $bills = Bill::where('id_user',Session::get('id_user'))->get();
       view()->share('bills', $bills);
       $cart_delete = Cart::where('id_user',Session::get('id_user'))->delete();
       $nguoidung = User::where('id',Session::get('id_user'))->first();
       $this->capnhatgiohang($request);
       return view('page.LichSuMuaHang',['bills'=>$bills,'nguoidung'=>$nguoidung]);

   }

   public function getGioiThieu(){
       return view('page.GioiThieu');
   }


   public function getLienHe(){
    return view('page.LienHe');
   }


   public function getGioHang(){
    $product_buy = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.id','cart.id_user','cart.soluong','cart.thanhtoan','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
    ->get();
    $total = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.id','cart.soluong','cart.thanhtoan')->sum('cart.thanhtoan');
    return view('page.GioHang',['product_buy'=>$product_buy,'total'=>$total]);
    echo $product_buy;
   }

   public function getDel_review_cart(Request $request, $id)
   {
       $del_cart = Cart::find($id);
       $del_cart->delete();
       $product_buy = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.id','cart.soluong','cart.thanhtoan','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
       ->get();
       $this->capnhatgiohang($request);
       return redirect('gio-hang')->with('thongbao','Bạn đã xoá thành công');
   }
   public function postUpdate_Review_cart(Request $request)
   {
       $a = $request->id;
       $b = $request->soluong;
       $dem = 0;
       $product_buy = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.id','cart.soluong','cart.thanhtoan','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
       ->get();
       $cart = Cart::all();
       $dem_cart = Cart::all()->count();

       foreach($a as $id)
       {
           $dem ++;
       }

       for ($i=0; $i < $dem ; $i++) {
        for ($j=0; $j < $dem_cart; $j++) {
             $id_truyenvao =  $a[$i];
             $soluong_truyenvao = $b[$i];

             $id_kiểm_tra = $cart[$j]->id;
             $soluong_can_thay_the = $cart[$j]->soluong;

             if($cart[$j]->id == $id_truyenvao)
             {
                 $cart[$j]->soluong = $soluong_truyenvao;
                 $cart[$j]->save();
                 if(($product_buy[$i]->promotion_price != 0))
                 {
                    $cart[$j]->thanhtoan = $soluong_truyenvao * $product_buy[$i]->promotion_price;
                 }
                 else
                 {
                    $cart[$j]->thanhtoan = $soluong_truyenvao * $product_buy[$i]->unit_price;
                 }
                 $cart[$j]->save();
             }
        }
       }
       $update_cart = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.id','cart.soluong','cart.thanhtoan','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
       ->get();
       $total = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.thanhtoan')
       ->sum('cart.thanhtoan');
       $this->capnhatgiohang($request);
       return view('page.GioHangCapNhat',['update_cart'=>$update_cart,'total'=>$total])->with('thongbao','Bạn đã cập nhật giỏ hàng thành công');





   }
   public function postGioHang(Request $request,$id){
       if(Session::has('id_user'))
       {
        $sanpham = Product::where('id',$id)->first();
        // kiểm tra có dòng sản phẩm đấy không
        $check = Cart::where('id_user',$request->session()->get('id_user'))->where('id_sanpham',$id)->first();
        if(!isset($check))
        {
            $cart = new Cart();
            $cart->id_user = $request->session()->get('id_user');
            $cart->id_sanpham = $id;
            $cart->soluong = $request->soluong;
            if($sanpham->promotion_price != 0)
            {
                $cart->thanhtoan = $request->soluong * $sanpham->promotion_price;
            }
            else
            {
                $cart->thanhtoan = $request->soluong * $sanpham->unit_price;
            }
            $cart->save();
        }
        else
        {
            $cart = Cart::where('id_user',$request->session()->get('id_user'))->where('id_sanpham',$id)->first();
            $cart->soluong += $request->soluong;
            if($sanpham->promotion_price != 0)
            {
                $cart->thanhtoan = $cart->thanhtoan + $request->soluong * $sanpham->promotion_price;
            }
            else
            {
                $cart->thanhtoan = $cart->thanhtoan + $request->soluong * $sanpham->unit_price;
            }
            $cart->save();
        }
        $this->capnhatgiohang($request);
        return redirect('chi-tiet-sp/'.$id)->with('thongbao','Bạn đã thêm vào giỏ hàng thành công');
       }
       else
       {
           return redirect('dang-nhap-dang-ki')->with('thongbao','Bạn chưa đăng nhập');
       }
   }

   public function capnhatgiohang(Request $request){
    $product_buy = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.soluong','cart.id','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
    ->get();
    $count = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.soluong','cart.id','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
    ->count();
    $tongtien = DB::table('cart')
    ->where('cart.id_user', '=', Session::get('id_user'))
    ->join('products', 'cart.id_sanpham', '=', 'products.id')
    ->select('cart.soluong','cart.id','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
    ->sum('cart.thanhtoan');
    $request->session()->put('count',$count);
    $request->session()->put('product_buy',$product_buy);
    $request->session()->put('tongtien',$tongtien);

   }


   public function getXoaGioHang(Request $request, $id)
   {
    $cart_delete = Cart::find($id);
    $cart_delete->delete();
    $this->capnhatgiohang($request);
    Session::get('id_product_detail');
    return redirect('chi-tiet-sp/'.Session::get('id_product_detail'));
   }


   public function getDanhSachTin(){
    return view('page.DanhSachTin');
   }

   public function getChiTietTin(){
    return view('page.ChiTietTin');
   }

   public function getDanhSachSp($id){

       $product_type = ProductType::find($id);
       $sanphamkhac = Product::where('id_type','<>',$id)->paginate(3);
    return view('page.DanhSachSp',['product_type'=>$product_type,'sanphamkhac'=>$sanphamkhac]);
   }

   public function getDanhSachSpDanhMuc($id)
   {
        $loaisanpham = ProductType::where('id_category',$id)->get();
        return view('page.DanhSachSpDanhMuc',['loaisanpham'=>$loaisanpham]);
   }

   public function getChiTietSp(Request $request,$id){
     $product_detail = Product::where('id',$id)->first();
     $product_seem = Product::where('id_type',$product_detail->id_type)->paginate(4);
     $request->session()->put('id_product_detail',$id);
     return view('page.ChiTietSp',['product_detail'=>$product_detail,'product_seem'=>$product_seem]);
   }

   public function postReview(Request $request,$id)
   {
      $review = new Review();
      echo $review->id_sanpham = $id;
      echo $request->name = $request->name;
      echo $request->phone = $request->phone;
      echo $request->review = $request->review;
      $review->save();
   }

   public function getTimKiemSp(Request $request)
   {
       $product_search = Product::where('name','like','%'.$request->search.'%')
                                 ->orWhere('unit_price','like',$request->search)
                                 ->orWhere('promotion_price','like',$request->search)->get();

       return view('page.TimKiemSp',['product_search'=>$product_search]);
   }

   public function getDangNhapDangKy(){
    return view('page.DangNhapDangky');
   }
   public function postDangKy(Request $request)
   {
      $this->validate($request,
      [
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|confirmed',
        'phone'=>'required|unique:users,phone'
      ],
      [
        'name.required'=>'Bạn chưa nhập tên',
        'email.required'=>'Bạn chưa nhập email',
        'email.email'=>'Bạn chưa nhập đúng định dạng email',
        'email.unique'=>'Email này đã tồn tại',
        'password.required'=>'Bạn chưa nhập password',
        'phone.required'=>'Bạn chưa nhập số điện thoại',
        'phone.unique'=>'Số điện thoại đã tồn tại',
      ]);
      $nguoidung = new User();
      $nguoidung->name = $request->name;
      $nguoidung->email = $request->email;
      $nguoidung->phone = $request->phone;
      $nguoidung->password = Hash::make($request->password);
      $nguoidung->save();
      $request->session()->put('id_user',$nguoidung->id);
      $request->session()->put('name',$nguoidung->name);
      // tạo ra cái session cart của người dùng đó
      $this->capnhatgiohang($request);
      return redirect('index');
   }
   public function postDangNhap(Request $request)
   {
       $dem = User::where('email',$request->email)->count();
       if($dem != 0)
       {
            $nguoidung = User::where('email',$request->email)->first();

            if ($nguoidung && Hash::check($request->password, $nguoidung->password)) {
                $request->session()->put('id_user',$nguoidung->id);
                $request->session()->put('name',$nguoidung->name);
                $request->session()->put('role_id',$nguoidung->role_id);
                session(['id_user' => $nguoidung->id]);
                session(['name' => $nguoidung->name]);
                session(['role_id' => $nguoidung->role_id]);
                // tạo ra cái session cart của người dùng đó
                $this->capnhatgiohang($request);
                return view('page.TrangChu');
            }
       }
       else
       {
           return redirect('dang-nhap-dang-ki')->with('thongbao','Đăng Nhập thất bại vui lòng kiểm tra lại tài khoản và mật khẩu');
       }
   }
   public function getDangXuat( Request $request)
   {
       $request->session()->flush();
       return view('page.TrangChu');
   }

   public function getThongTinTaiKhoan($id){
       $nguoidung = User::where('id',$id)->first();
       return view('page.ThongTinTaiKhoan',['nguoidung'=>$nguoidung]);
   }
   public function postThongTinTaiKhoan(Request $request,$id)
   {
       $nguoidung = User::find($id);
       if($request->hasFile('avatar'))
       {
           $file = $request->file('avatar');
           $name = $file->getClientOriginalName();
           $file->move('source\image\user',$name);
           $nguoidung->avatar = $name;
       }
       else
       {
           echo "Bạn chưa chọn ảnh";
       }
       $nguoidung->name = $request->name;
       $nguoidung->email = $request->email;
       $nguoidung->phone = $request->phone;
       $nguoidung->password = $request->password;
       $nguoidung->address = $request->address;
       $nguoidung->save();
       return redirect('thong-tin-tai-khoan/'.$id)->with('thongbao','Bạn đã cập nhật thông tin thành công');

   }
   public function getLichSuMuaHang($id){
       $nguoidung = User::find($id);
       $bills = Bill::where('id_user',Session::get('id_user'))->get();
       $product_buy = DB::table('cart')
       ->where('cart.id_user', '=', Session::get('id_user'))
       ->join('products', 'cart.id_sanpham', '=', 'products.id')
       ->select('cart.soluong','cart.id','products.name', 'products.image', 'products.unit_price', 'products.promotion_price')
       ->get();
       view()->share('nguoidung', $nguoidung);
       return view('page.LichSuMuaHang',['nguoidung'=>$nguoidung,'bills'=>$bills]);
   }
   public function getXoaLichSuMuaHang($id){
       $bills = Bill::where('id',$id)->delete();
       $nguoidung = User::where('id',Session::get('id_user'))->first();
       $bills = Bill::where('id_user',Session::get('id_user'))->get();
       view()->share('nguoidung', $nguoidung);
       return view('page.LichSuMuaHang',['nguoidung'=>$nguoidung,'bills'=>$bills]);
   }

}
