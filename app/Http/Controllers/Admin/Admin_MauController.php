<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MauModels;

class Admin_MauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mau'] = MauModels::paginate(5);
        $data['max_length'] = 100;
        return view('Admin.Mau.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Mau.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        MauModels::create($input);
        return redirect('mau')->with('flash_message', 'Thêm Màu thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Mau = MauModels::find($id);
        return view('Admin.Mau.show')->with('Mau', $Mau);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $Mau = MauModels::find($id);
        return view('Admin.Mau.edit', ['Mau' => $Mau]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $Mau = MauModels::find($id);
        $input = $request->all();
        $Mau->update($input);
        return redirect()->route('mau')->with('flash_message', 'Cập nhật màu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        MauModels::destroy($id);
        return redirect()->route('mau')->with('flash_message', 'Xóa màu thành công');
    }
}
