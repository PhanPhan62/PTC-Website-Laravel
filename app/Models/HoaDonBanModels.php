<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonBanModels extends Model
{
    use HasFactory;
    protected $table = 'hoadonxuat';
    protected $fillable = [
        'NgayXuat',
        'MaKhachHang',
        'MaNhanVien',
    ];
    public $timestamps = false;
}
