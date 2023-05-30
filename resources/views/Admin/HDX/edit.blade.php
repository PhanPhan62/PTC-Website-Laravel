{{-- @extends('Admin.layoutadmin')
@section('title', 'Edit')
@section('content_admin')
<div class="col-lg-6 mx-auto">
    <div class="card" style="margin:20px;">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
            <form action="{{ route('update.category', $Categories->id)}}" method="post">
                {!! csrf_field() !!}
                @method("PUT")
                <div class="select-style-1">
                    <label>Tên loại</label>
                    <input type="text" name="TenLoaiSP" id="name" value="{{$Categories->TenLoaiSP}}" class="form-control" required>
                </div>
                <div class="select-style-1">
                    <label>Trạng thái</label>
                    <div class="select-position">
                        <select name="TrangThai">
                            <option value="1" {{$Categories->TrangThai==0?'selected':''}} >Đang hoạt động</option>
                            <option value="0" {{$Categories->TrangThai==0?'selected':''}} >Ngưng hoạt động</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Update" class=" main-btn success-btn-outline rounded-full btn-hover ">
                <a href="/category" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
            </div>
        </div>
    </div> 
@stop --}}
