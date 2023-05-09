@extends('Admin.layoutadmin')
@section('title', 'Show')
@section('content_admin')
<div class="card" style="margin:20px;">
    {{-- <div class="card-header">hi</div> --}}
        <div class="card-body">
            <div class="card-body">
                <h5 style="color:green" class="card-title">Mã Đơn Vị Tính : {{ $DonViTinh->id }}</h5>
                <p style="color:green" class="card-text">Tên Đơn Vị Tính : {{ $DonViTinh->TenDonViTinh }}</p>
            </div>
            <a href="/category" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
        </div>
    {{-- </div> --}}
</div>
@stop
