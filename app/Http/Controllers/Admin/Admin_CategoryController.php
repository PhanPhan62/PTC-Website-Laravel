<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSP;


class Admin_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['loaisp'] = LoaiSP::paginate(5);

        return view('Admin.Categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        LoaiSP::create($input);
        return redirect('category')->with('flash_message', 'Thêm Loại Sản Phẩm thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $MaLoaiSP)
    {
        $CategoryModels = LoaiSP::find($MaLoaiSP);
        return view('Admin.Categories.show')->with('Categories', $CategoryModels);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $MaLoaiSP)
    {
        $CategoryModels = LoaiSP::find($MaLoaiSP);
        return view('Admin.Categories.edit', ['Categories' => $CategoryModels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $MaLoaiSP)
    {
        $CategoryModels = LoaiSP::find($MaLoaiSP);
        $input = $request->all();
        $CategoryModels->update($input);
        return redirect()->route('Category')->with('flash_message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $MaLoaiSP)
    {
        LoaiSP::destroy($MaLoaiSP);
        return redirect()->route('Category')->with('flash_message', 'Xóa thành công');
    }
}
