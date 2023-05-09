<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViTinhModels extends Model
{
    use HasFactory;
    protected $table = 'donvitinh';
    protected $fillable = [
        'TenDonViTinh'
    ];
    public $timestamps = false;
}
