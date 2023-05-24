<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModels;
use App\Models\MauModels;
use App\Models\SizeModels;
use App\Models\DonViTinhModels;
use App\Models\NSXModels;
use App\Models\LoaiSP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;



class Admin_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sanpham'] = ProductModels::paginate(5);
        $data['max_length'] = 100;
        // dd(request()->search);
        if ($search = request()->search) {
            $data['sanpham'] = ProductModels::where('TenSanPham', 'LIKE', '%' . $search . '%')->paginate(5);
            $data['max_length'] = 100;
        }
        return view('Admin.Products.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $Cate = LoaiSP::orderBy('TenLoaiSP', 'ASC')->select('id', 'TenLoaiSP')->where('TrangThai', '=', '1')->get();
        $Mau = MauModels::orderBy('TenMau')->select('id', 'TenMau', 'MoTa')->get();
        $Size = SizeModels::orderBy('TenSize')->select('id', 'TenSize', 'MoTa')->get();
        $DonViTinh = DonViTinhModels::orderBy('TenDonViTinh')->select('id', 'TenDonViTinh')->get();
        $NhaSanXuat = NSXModels::orderBy('TenNSX')->select('id', 'TenNSX', 'SoDienThoai', 'Email')->get();


        return view('Admin.Products.create', compact('Cate', 'Mau', 'Size', 'DonViTinh', 'NhaSanXuat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new ProductModels([
            'MaLoaiSP' => $request->get('MaLoaiSP'),
            'TenSanPham' => $request->get('TenSanPham'),
            'MoTaSanPham' => $request->get('MoTaSanPham'),
            'AnhDaiDien' => $request->get('AnhDaiDien'),
            'GiaBan' => $request->get('GiaBan'),
            'MaNSX' => $request->get('MaNSX'),
            'MaDonViTinh' => $request->get('MaDonViTinh'),
            'MaMau' => $request->get('MaMau'),
            'MaSize' => $request->get('MaSize'),
        ]);
        if ($request->hasFile('AnhDaiDien')) {
            $file = $request->file('AnhDaiDien');
            $fileName = $file->getClientOriginalName();
            $path = $file->move(base_path('public/uploads'), $fileName);
            $products->AnhDaiDien = $fileName;
        }
        $products->save();
        return redirect('product')->with('flash_message', 'Thêm thành công!!!');
        // if($request->has(''))
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // $Cate = LoaiSP::orderBy('TenLoaiSP', 'ASC')->select('id', 'TenLoaiSP')->where('id', '=', '1')->get();
        // $Mau = MauModels::orderBy('TenMau')->select('id', 'TenMau', 'MoTa')->get();
        // $Size = SizeModels::orderBy('TenSize')->select('id', 'TenSize', 'MoTa')->get();
        // $DonViTinh = DonViTinhModels::orderBy('TenDonViTinh')->select('id', 'TenDonViTinh')->get();
        // $NhaSanXuat = NSXModels::orderBy('TenNSX')->select('id', 'TenNSX', 'SoDienThoai', 'Email')->get();
        // $sanpham = ProductModels::find($id);



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
            'Admin.Products.show',

            [
                // 'Cate' => $Cate,
                // 'Mau' => $Mau,
                // 'Size' => $Size,
                // 'DonViTinh' => $DonViTinh,
                // 'NhaSanXuat' => $NhaSanXuat,
                'sanpham' => $sanpham
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $Cate = LoaiSP::orderBy('TenLoaiSP', 'ASC')->select('id', 'TenLoaiSP')->where('TrangThai', '=', '1')->get();
        $Mau = MauModels::orderBy('TenMau')->select('id', 'TenMau', 'MoTa')->get();
        $Size = SizeModels::orderBy('TenSize')->select('id', 'TenSize', 'MoTa')->get();
        $DonViTinh = DonViTinhModels::orderBy('TenDonViTinh')->select('id', 'TenDonViTinh')->get();
        $NhaSanXuat = NSXModels::orderBy('TenNSX')->select('id', 'TenNSX', 'SoDienThoai', 'Email')->get();
        $sanpham = ProductModels::find($id);
        return view('Admin.Products.edit', compact('Cate', 'Mau', 'Size', 'DonViTinh', 'NhaSanXuat', 'sanpham'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, int $id)
    {
        $sanpham = ProductModels::findOrFail($id);
        $input = $request->all();

        // Kiểm tra xem có file ảnh mới được tải lên hay không
        if ($request->hasFile('AnhDaiDien')) {
            // Xóa file ảnh cũ nếu nó tồn tại trong thư mục public
            if (file_exists(public_path('uploads/' . $sanpham->AnhDaiDien))) {
                Storage::delete('public/uploads/' . $sanpham->AnhDaiDien);
            }

            // Lưu file ảnh mới vào thư mục public/uploads
            $file = $request->file('AnhDaiDien');
            $fileName = $file->getClientOriginalName();
            dd($fileName);
            $path = $file->move(base_path('public/uploads'), $fileName);
            $input['AnhDaiDien'] = $fileName;
        }

        $sanpham->update($input);
        return redirect()->route('product')->with('flash_message', 'sanpham Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        ProductModels::destroy($id);
        return redirect()->route('product')->with('flash_message', 'sanpham deleted!');
    }
}
