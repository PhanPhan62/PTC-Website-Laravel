@extends('Admin.layoutadmin')
@section('title', 'Show')
@section('content_admin')
<div class="card" style="margin:20px;">
    <div class="card-header">Show Product</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Tên sản phẩm : {{ $sanpham->TenSanPham}}</h5>
                <p class="card-text"><span style="font-weight: bold">Tên Loại sản phẩm :</span> {{ $sanpham->TenLoaiSP }}</p>
                <p class="card-text"><span style="font-weight: bold">Ảnh sản phẩm :</span> <img src="" alt=""><img  style="height: 200px; margin-left: 20px" src="{{ asset(''.'uploads/'. $sanpham->AnhDaiDien) }}" alt="{{ $sanpham->AnhDaiDien}}"></p>
                <p class="card-text"><span style="font-weight: bold">Mô Tả sản phẩm :</span> {{ $sanpham->MoTaSanPham}}</p>
                <p class="card-text"><span style="font-weight: bold">Giá bán sản phẩm :</span> {{number_format($sanpham->GiaBan)}} VNĐ</p>
                <p class="card-text"><span style="font-weight: bold">Nhà sản xuất :</span> {{ $sanpham->TenNSX}}</p>
                <p class="card-text"><span style="font-weight: bold">Đơn vị tính :</span> {{ $sanpham->TenDonViTinh}}</p>
                <p class="card-text" >
                    <span style="font-weight: bold">Màu :
                        <p title="{{$sanpham->MoTa}}" style="width: 20px; height: 20px; border: 1px solid black; background:{{ $sanpham->TenMau}}; border-radius: 50%">
                        </p>    
                    </span>
                </p>
                <p class="card-text"><span style="font-weight: bold">Kích cỡ :</span> {{ $sanpham->TenSize}}</p>
        </div>
        <a href="/product" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
    </div>
</div>
@stop
