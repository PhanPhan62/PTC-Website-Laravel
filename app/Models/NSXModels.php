<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NSXModels extends Model
{
    use HasFactory;
    protected $table = 'nhasanxuat';
    protected $fillable = [
        'TenNSX',
        'SoDienThoai',
        'Email',
        'MoTa'
    ];
    public $timestamps = false;
}
