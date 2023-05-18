<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangModels extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $fillable = [
        'MaKhachHang',
        'NgayDat',
        'TongTien',
        'TrangThaiDonHang'
    ];
    public $timestamps = false;
}
