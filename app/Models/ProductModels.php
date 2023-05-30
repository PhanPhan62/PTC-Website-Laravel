<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductModels extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'MaLoaiSP',
        'TenSanPham',
        'MoTaSanPham',
        'AnhDaiDien',
        'GiaBan',
        'MaNSX',
        'MaDonViTinh',
        'MaMau',
        'MaSize'
    ];
    public $timestamps = false;
    public function BestSeller()
    {
        $bestSelling = DB::table('DonHang')
            ->join('ChiTietDonHang', 'DonHang.id', '=', 'ChiTietDonHang.MaDonHang')
            ->join('SanPham', 'ChiTietDonHang.MaSanPham', '=', 'SanPham.id')
            ->where('DonHang.TrangThaiDonHang', '=', 1)
            ->groupBy('SanPham.id', 'SanPham.MaLoaiSP', 'SanPham.TenSanPham', 'SanPham.MoTaSanPham', 'SanPham.AnhDaiDien', 'SanPham.MaDonViTinh', 'SanPham.MaNSX', 'SanPham.MaMau', 'SanPham.MaSize', 'SanPham.GiaBan')
            ->select('SanPham.*', DB::raw('SUM(ChiTietDonHang.SoLuong) as totalSold'))
            ->orderBy('totalSold', 'desc')
            ->take(10)
            ->get();
        // dd($bestSelling);
        return $bestSelling;
    }
    public function NewProduct()
    {
        $newproduct = DB::table('SanPham')
            ->join('ChiTietHoaDonNhap', 'SanPham.id', '=', 'ChiTietHoaDonNhap.MaSanPham')
            ->join('HoaDonNhap', 'ChiTietHoaDonNhap.MaHoaDonNhap', '=', 'HoaDonNhap.id')
            ->whereBetween('HoaDonNhap.NgayNhap', [
                Carbon::now()->subDays(7)->toDateTimeString(), Carbon::now()->toDateTimeString()
            ])
            ->select('SanPham.*')
            ->distinct()
            ->get();

        return $newproduct;
    }
    public function Sell()
    {
        $sell = DB::table('sanpham')
            ->join('giamgia', 'giamgia.MaSanPham', '=', 'sanpham.id')
            ->where('giamgia.TrangThai', '=', 1)
            ->where('giamgia.ThoiGianBatDau', '<=', now())
            ->where('giamgia.ThoiGianKetThuc', '>=', now())
            ->select('sanpham.*', 'giamgia.PhanTram')
            ->get();
        return $sell;
    }
    public function Details($id)
    {
        $details = DB::table('sanpham')
            ->join('loaisp', 'sanpham.MaLoaiSP', '=', 'loaisp.id')
            ->join('nhasanxuat', 'sanpham.MaNSX', '=', 'nhasanxuat.id')
            ->join('donvitinh', 'sanpham.MaDonViTinh', '=', 'donvitinh.id')
            ->join('mau', 'sanpham.MaMau', '=', 'mau.id')
            ->join('size', 'sanpham.MaSize', '=', 'size.id')
            ->select('sanpham.*', 'loaisp.TenLoaiSP', 'nhasanxuat.TenNSX', 'donvitinh.TenDonViTinh', 'mau.TenMau', 'size.TenSize')
            ->where('sanpham.id', $id)
            ->first();
        return $details;
    }

    public function LoaiSP()
    {
        return $this->belongsTo(LoaiSP::class, 'TenLoaiSP', 'TrangThai');
    }
    public function Mau()
    {
        return $this->belongsTo(MauModels::class, 'TenMau', 'MoTa');
    }
    // public function ChiTietAnhModels()
    // {
    //     return $this->hasMany(ChiTietAnhModels::class, 'MaSanPham', 'Anh');
    // }
}
