@extends('Admin.layoutadmin')
@section('title', 'Edit')
@section('content_admin')
<div class="col-lg-6 mx-auto">
    <div class="card" style="margin:20px;">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
            <form action="{{ route('update.dvt', $DonViTinh->id)}}" method="post">
                {!! csrf_field() !!}
                @method("PUT")
                <div class="select-style-1">
                    <label>Tên Đơn vị tính</label>
                    <input type="text" name="TenDonViTinh" id="name" value="{{$DonViTinh->TenDonViTinh}}" class="form-control" required>
                </div>
                <input type="submit" value="Update" class=" main-btn success-btn-outline rounded-full btn-hover ">
                <a href="/dvt" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
            </form>
        </div>
    </div>
</div> 
    
@stop
