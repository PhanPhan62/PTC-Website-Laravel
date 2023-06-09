<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModels;
use App\Models\MauModels;
use App\Models\SizeModels;
use App\Models\DonViTinhModels;
use App\Models\NSXModels;
use App\Models\LoaiSP;
use App\Models\ChiTietAnhModels;
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

        if ($request->hasFile('AnhDaiDien')) {
            $file = $request->file('AnhDaiDien');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(\public_path('uploads/'), $fileName);
            // $path = $file->move(base_path('public/uploads'), $fileName);
            $products = new ProductModels([
                'MaLoaiSP' => $request->MaLoaiSP,
                'TenSanPham' => $request->TenSanPham,
                'MoTaSanPham' => $request->MoTaSanPham,
                'AnhDaiDien' =>  $fileName,
                // 'Anh' =>,
                'GiaBan' => $request->GiaBan,
                'MaNSX' => $request->MaNSX,
                'MaDonViTinh' => $request->MaDonViTinh,
                'MaMau' => $request->MaMau,
                'MaSize' => $request->MaSize,
            ]);
            $products->save();
        }

        if ($request->hasFile('Anhs')) {
            $files = $request->file("Anhs");
            // dd();
            foreach ($files as $item) {
                $fileName = time() . '_' . $item->getClientOriginalName();
                $request['MaSanPham'] = $products->id;
                $request['Anh'] = $fileName;
                $path = $item->move(\public_path('/uploads/ChiTiet'), $fileName);
                ChiTietAnhModels::create($request->all());
            }
        }
        return redirect('product')->with('flash_message', 'Thêm thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id = null)
    {
        // $cta = ChiTietAnhModels::where('MaSanPham', $id);
        // dd($cta);
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
                // 'cta' => $cta,
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
        $img = ProductModels::findOrFail($id);
        if (File::exists('uploads/' . $img->AnhDaiDien)) {
            File::delete('uploads/' . $img->AnhDaiDien);
        }
        $imgs = ChiTietAnhModels::where('MaSanPham', $img->id)->get();
        foreach ($imgs as $item) {
            if (File::exists('/uploads/ChiTiet' . $item->Anh)) {
                File::delete('/uploads/ChiTiet' . $item->Anh);
            }
        }
        $img->delete();
        ProductModels::destroy($id);
        return redirect()->route('product')->with('flash_message', 'sanpham deleted!');
    }
}
