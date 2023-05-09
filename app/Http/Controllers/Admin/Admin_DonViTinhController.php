<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonViTinhModels;

class Admin_DonViTinhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['donvitinh'] = DonViTinhModels::paginate(5);
        return view('Admin.DonViTinh.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.DonViTinh.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        DonViTinhModels::create($input);
        return redirect('dvt')->with('flash_message', 'Thêm đơn vị tính thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $DonViTinh = DonViTinhModels::find($id);
        return view('Admin.DonViTinh.show')->with('DonViTinh', $DonViTinh);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $DonViTinh = DonViTinhModels::find($id);
        return view('Admin.DonViTinh.edit', ['DonViTinh' => $DonViTinh]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $DonViTinh = DonViTinhModels::find($id);
        $input = $request->all();
        $DonViTinh->update($input);
        return redirect()->route('dvt')->with('flash_message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        DonViTinhModels::destroy($id);
        return redirect()->route('dvt')->with('flash_message', 'Xóa thành công');
    }
}
