<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SizeModels extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = ['TenSize', 'MoTa'];
    public $timestamps = false;
}
