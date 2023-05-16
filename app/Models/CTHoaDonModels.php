<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHoaDonModels extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = [
        'MaDonHang',
        'MaSanPham',
        'SoLuong',
        'GiaMua'
    ];
    public $timestamps = false;
}
