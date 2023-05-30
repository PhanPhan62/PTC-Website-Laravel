<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::paginate(5);
        $data['max_length'] = 10;
        // dd(request()->search);
        if ($search = request()->search) {
            $data['User'] = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('gender', 1)
                ->paginate(5);
            $data['max_length'] = 100;
        }
        return view('Admin.NhanVien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.NhanVien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        User::create($input);
        return redirect('category')->with('flash_message', 'Thêm Loại Sản Phẩm thành công!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $NhanVien = User::find($id);
        return view('Admin.NhanVien.show')->with('NhanVien', $NhanVien);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $NhanVien = User::find($id);
        return view('Admin.NhanVien.edit', ['NhanVien' => $NhanVien]); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $NhanVien = User::find($id);
        $input = $request->all();
        $NhanVien->update($input);
        return redirect()->route('Category')->with('flash_message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect()->route('Category')->with('flash_message', 'Xóa thành công');
    }
}
