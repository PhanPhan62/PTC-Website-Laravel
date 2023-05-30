<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoaDonBanModels;

class HoaDonBanController extends Controller
{
    public function index()
    {
        $data['hoadonxuat'] = HoaDonBanModels::paginate(5);

        return view('Admin.HDX.index', $data);
    }
}
