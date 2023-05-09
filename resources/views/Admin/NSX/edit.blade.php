@extends('Admin.layoutadmin')
@section('title', 'Edit')
@section('content_admin')
<div class="col-lg-6 mx-auto">
    <div class="card" style="margin:20px;">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
            <form action="{{ route('update.nhasanxuat', $NSX->id)}}" method="post">
                {!! csrf_field() !!}
                @method("PUT")
                <div class="select-style-1">
                    <label>Tên NSX</label>
                    <input type="text"  name="TenNSX" id="name" value="{{$NSX->TenNSX}}" class="form-control" required>
                </div>
                <div class="select-style-1">
                    <label>SĐT</label>
                    <input type="text"  name="SoDienThoai" id="SDT" value="{{$NSX->SoDienThoai}}" class="form-control" required>
                </div>  
                <div class="select-style-1">
                    <label>Email</label>
                    <input type="text"  name="Email" id="Email" value="{{$NSX->Email}}" class="form-control" required>
                </div>
                <div class="select-style-1">
                    <label>Mô tả</label>
                    <input type="text"  name="MoTa" id="mota" value="{{$NSX->MoTa}}" class="form-control" required>
                </div>
                <input type="submit" value="Update" class=" main-btn success-btn-outline rounded-full btn-hover ">
                <a href="/nhasanxuat" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
            </form>
        </div>
    </div>
</div> 
    
@stop
