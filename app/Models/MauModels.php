<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauModels extends Model
{
    use HasFactory;
    protected $table = 'mau';
    protected $fillable = ['TenMau', 'MoTa'];
    public $timestamps = false;
}
