@extends('Admin.layoutadmin')
@section('title', 'Show')
@section('content_admin')
<div class="card" style="margin:20px;">
    <div class="card-header">Students Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Mã Loại sản phẩm : {{ $Categories->id }}</h5>
                <p class="card-text">Tên Loại sản phẩm : {{ $Categories->TenLoaiSP }}</p>
                {{-- <p class="card-text">Trạng thái : {!! $Categories->TrangThai ? '<span class="status-btn success-btn">Đang hoạt động</span> ' : '<span class="status-btn danger-btn">Ngưng hoạt động</span> '!!}</p> --}}
                <p class="card-text">Trạng thái : {!! $Categories->TrangThai ? '<i class="fas fa-check-circle fa-lg fa-bounce" style="color: #3da288;"></i> ' : '<i class="fa-sharp fa-solid fa-circle-xmark fa-bounce" style="color: #bf0f0b;"></i> '!!}</p>
        </div>
        <a href="/category" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
    </div>
</div>
@stop
