<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NSXModels;

class Admin_NSXController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['nhasanxuat'] = NSXModels::paginate(5);
        $data['max_length'] = 50;
        return view('Admin.NSX.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.NSX.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        NSXModels::create($input);
        return redirect('nhasanxuat')->with('flash_message', 'Thêm thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $NSX = NSXModels::find($id);
        return view('Admin.NSX.show')->with('NSX', $NSX);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $NSX = NSXModels::find($id);
        return view('Admin.NSX.edit', ['NSX' => $NSX]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $NSX = NSXModels::find($id);
        $input = $request->all();
        $NSX->update($input);
        return redirect()->route('nhasanxuat')->with('flash_message', 'Cập nhật màu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        NSXModels::destroy($id);
        return redirect()->route('nhasanxuat')->with('flash_message', 'Xóa màu thành công');
    }
}
