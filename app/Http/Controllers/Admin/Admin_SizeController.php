<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SizeModels;

class Admin_SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['size'] = SizeModels::paginate(5);
        return view('Admin.Size.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        SizeModels::create($input);
        return redirect('size')->with('flash_message', 'Thêm Màu thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $Size = SizeModels::find($id);
        return view('Admin.Size.show')->with('Size', $Size);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $Size = SizeModels::find($id);
        return view('Admin.Size.edit', ['Size' => $Size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $Size = SizeModels::find($id);
        $input = $request->all();
        $Size->update($input);
        return redirect()->route('size')->with('flash_message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        SizeModels::destroy($id);
        return redirect()->route('size')->with('flash_message', 'Xóa thành công');
    }
}
