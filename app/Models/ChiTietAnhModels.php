<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModels;

class ChiTietAnhModels extends Model
{
    use HasFactory;
    protected $table = 'chitietanh';
    protected $fillable = [
        'MaSanPham',
        'Anh'
    ];
    public $timestamps = false;
    public function IMGDetails($id)
    {
        $imgdetails = DB::table('chitietanh')
            ->join('sanpham', 'chitietanh.MaSanPham', '=', 'sanpham.id')
            ->select('chitietanh.*', 'sanpham.AnhDaiDien')
            ->where('sanpham.id', $id)
            ->get();
        return $imgdetails;
    }
    public function sanPham()
    {
        return $this->belongsTo(ProductModels::class, 'MaSanPham', 'id');
    }
}
