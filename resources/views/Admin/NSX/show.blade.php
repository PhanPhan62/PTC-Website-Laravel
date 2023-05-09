@extends('Admin.layoutadmin')
@section('title', 'Show')
@section('content_admin')
<div class="card" style="margin:20px;">
    {{-- <div class="card-header">hi</div> --}}
        <div class="card-body">
            <div class="card-body">
                <h5 style="color:green" class="card-title">Mã NSX: {{ $NSX->id }}</h5>
                <p style="color:green" class="card-text">Tên NSX: {{ $NSX->TenNSX }}</p>
                <p style="color:green" class="card-text">SĐT: {{ $NSX->SoDienThoai }}</p>
                <p style="color:green" class="card-text">Email: {{ $NSX->Email }}</p>
                <p style="color:green" class="card-text">Mô tả : {{ $NSX->MoTa }}</p>
            </div>
            <a href="/nhasanxuat" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
        </div>
    {{-- </div> --}}
</div>
@stop
