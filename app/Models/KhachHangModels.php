<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModels extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = [
        'TenKhachHang',
        'DiaChi',
        'SoDienThoai',
        'Email'
    ];
    public $timestamps = false;
}
