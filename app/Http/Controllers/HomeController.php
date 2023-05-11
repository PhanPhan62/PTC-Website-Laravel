<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProductModels;
use App\Models\LoaiSP;
use App\Models\ChiTietAnhModels;
use App\Models\SizeModels;
use App\Models\MauModels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $db = ProductModels::all();
        $ProductModels = new ProductModels();

        $bestSelling = $ProductModels->BestSeller();
        $newproduct = $ProductModels->NewProduct();
        $sell = $ProductModels->Sell();
        return view('FrontEnd.index', [
            'db' => $db,
            'bestSelling' => $bestSelling,
            'newproduct' => $newproduct,
            'sell' => $sell,
        ]);
    }
    public function layout($id = null, Request $request)
    {
        if ($id = null) {
            return view('FrontEnd.layout');
        } else {
            $sanpham = DB::table('sanpham')
                ->join('loaisp', 'sanpham.MaLoaiSP', '=', 'loaisp.id')
                ->join('nhasanxuat', 'sanpham.MaNSX', '=', 'nhasanxuat.id')
                ->join('donvitinh', 'sanpham.MaDonViTinh', '=', 'donvitinh.id')
                ->join('mau', 'sanpham.MaMau', '=', 'mau.id')
                ->join('size', 'sanpham.MaSize', '=', 'size.id')
                ->select('sanpham.*', 'loaisp.TenLoaiSP', 'nhasanxuat.TenNSX', 'donvitinh.TenDonViTinh', 'mau.TenMau', 'size.TenSize', 'mau.MoTa')
                ->where('sanpham.id', $id)
                ->first();
            return view(
                'FrontEnd.layout',
                [
                    'sanpham' => $sanpham
                ]
            );
        }
    }


    public function productdetail($id = null)
    {
        $ProductModels = new ProductModels();
        $ChiTietAnhModels = new ChiTietAnhModels();
        $category2 = LoaiSP::orderBy('TenLoaiSP', 'ASC')->select('id', 'TenLoaiSP')->where('TrangThai', '1')->where('id', $id)->first();
        $product = ProductModels::find($id);
        $details = $ProductModels->Details($id);
        $imgdetails = $ChiTietAnhModels->IMGDetails($id);
        // $listimg = ChiTietAnhModels::where('MaSanPham', $id)->get();
        $similarProducts = ProductModels::where('MaLoaiSP', $product->MaLoaiSP)
            ->where('id', '!=', $id)
            ->get();
        $size = SizeModels::all();
        $mau = MauModels::all();
        $chitietanh = DB::table('chitietanh')
            ->join('sanpham', 'chitietanh.MaSanPham', '=', 'sanpham.id')
            ->select('chitietanh.*', 'sanpham.AnhDaiDien', 'sanpham.TenSanPham')
            ->where('chitietanh.MaSanPham', $id)
            ->get();

        // dd($chitietanh);
        return view('FrontEnd.productdetail', [
            'product' => $product,
            'details' => $details,
            'chitietanh' => $chitietanh,
            'imgdetails' => $imgdetails,
            'similarProducts' => $similarProducts,
            'category2' => $category2,
            'size' => $size,
            'mau' => $mau,
        ]);
    }
    public function shop($id = null)
    {
        // $category = LoaiSP::all();
        $category = LoaiSP::orderBy('TenLoaiSP', 'ASC')->select('id', 'TenLoaiSP')->where('TrangThai', '=', '1')->get();
        $product = ProductModels::where('MaLoaiSP', $id)->get();
        $product2 = ProductModels::all();
        return view('FrontEnd.shop', [
            'product' => $product,
            'product2' => $product2,
            'category' => $category
        ]);
    }
    public function shopcart()
    {
        return view('FrontEnd.shopcart');
    }
    public function signin()
    {
        return view('FrontEnd.signin');
    }
    public function postsignin(Request $request)
    {

        if (Auth::attempt($request->only(
            'email',
            'password'
        ))) {
            return redirect()->route('admin')->with('message', 'Chào Admin');
        } else {
            return redirect()->route('signin')->with('message', 'Tài Khoản hoặc mật khẩu không chính xác');
        }
    }

    public function signup()
    {
        return view('FrontEnd.signup');
    }
    public function logout()
    {
        if (Auth::logout()) {
            return redirect()->route('signin');
        } else {
            return redirect()->route('signin');
        }
    }
    public function postsignup(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Email đã tồn tại trong cơ sở dữ liệu
            return redirect()->route('signup')->with('message', 'Email này đã tồn tại.');
        } else {
            // dd($power);
            // Tạo người dùng mới
            $newUser = User::create([
                // 'date_of_birth' => Carbon::now(),
                'name' => $request->name,
                'power' => $request->power,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            // dd($newUser);
            // Thông báo tạo người dùng thành công hoặc thực hiện các tác vụ khác
            return redirect()->route('signup')->with('message', 'Người dùng đã được tạo thành công.');
        }
    }
    public function blog()
    {
        return view('FrontEnd.blog');
    }
}
