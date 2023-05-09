@extends('Admin.layoutadmin')
@section('title', 'Edit')
@section('content_admin')
<div class="col-lg-6 mx-auto">
    <div class="card" style="margin:20px;">
        <div class="card-header">@yield('title')</div>
        <div class="card-body">
            <form action="{{ route('update.size', $Size->id)}}" method="post">
                {!! csrf_field() !!}
                @method("PUT")
                <div class="select-style-1">
                    <label>Tên Size</label>
                    <input type="text"  name="TenSize" id="name" value="{{$Size->TenSize}}" class="form-control" required>
                </div>
                <div class="select-style-1">
                    <label>Mô tả</label>
                    <input type="text"  name="MoTa" id="mota" value="{{$Size->MoTa}}" class="form-control" required>
                </div>
                <input type="submit" value="Update" class=" main-btn success-btn-outline rounded-full btn-hover ">
                <a href="/size" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
            </form>
        </div>
    </div>
</div> 
    
@stop
