@extends('Admin.layoutadmin')
@section('title', 'Edit')
@section('content_admin')
    <div class="col-lg-6 mx-auto">
        <div class="card" style="margin:20px;">
            <div class="card-header">@yield('title')</div>
            <div class="card-body">
                <form action="{{ route('update.product', $sanpham->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method('PUT')
                    <div class="card-style mb-30">
                        <h6 class="mb-25">@yield('title')</h6>
                        <div class="select-style-1">
                            <label for="MaLoaiSP">Loại</label>
                            <div class="select-position">
                                <select name="MaLoaiSP" id="MaLoaiSP">
                                    @foreach ($Cate as $item)
                                        <option
                                            value="{{ $item->id }}"{{ $item->id == $sanpham->MaLoaiSP ? 'selected' : '' }}>
                                            {{ $item->TenLoaiSP }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-style-1">
                            <label for="TenSanPham">Tên Sản Phẩm</label>
                            <input type="text" name="TenSanPham" required placeholder="Tên Sản Phẩm"
                                value="{{ $sanpham->TenSanPham }}" id="TenSanPham" />
                        </div>
                        <div class="input-style-1 ">
                            <label for="MoTaSanPham">Mô Tả</label>
                            <input type="text" name="MoTaSanPham" required value="{{ $sanpham->MoTaSanPham }}"
                                placeholder="Mô tả" id="MoTaSanPham" />
                            {{-- <textarea name="MoTaSanPham" id="MoTaSanPham" cols="" rows="">
                                {{ $sanpham->MoTaSanPham }}
                            </textarea> --}}
                        </div>

                        <div class="input-style-1 ">
                            <label for="AnhDaiDien">Ảnh Đại Diện</label>
                            <img src="uploads/Sneaker_02.jpg" alt=""><img style="height: 100px" src="{{ asset(''.'uploads/'.$sanpham->AnhDaiDien) }}" alt="{{$sanpham->TenSanPham}}">

                            <?php $fileInput = request()->file('AnhDaiDien'); ?>
                            @if(!$fileInput)
                                <input type="file" name="AnhDaiDien"  
                                        id="AnhDaiDien" value="{{ $sanpham->AnhDaiDien }}"/>
                            @else
                                <input type="text" name="AnhDaiDien"  value="{{ $sanpham->AnhDaiDien }}" placeholder="{{ $sanpham->AnhDaiDien }}"
                                id="AnhDaiDien" />
                            @endif

                            
                        </div>
                        <div class="input-style-1 ">
                            <label for="GiaBan">Giá</label>
                            <input type="text" name="GiaBan" required value="{{ $sanpham->GiaBan }}" placeholder="Giá"
                                id="GiaBan" />
                        </div>
                        <div class="select-style-1">
                            <label for="MaNSX">Nhà Sản xuất</label>
                            <div class="select-position">
                                <select name="MaNSX" id="MaNSX">
                                    @foreach ($NhaSanXuat as $item)
                                        <option value="{{ $item->id }}">{{ $item->TenNSX }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="select-style-1">
                            <label for="MaDonViTinh">Đơn Vị Tính</label>
                            <div class="select-position">
                                <select name="MaDonViTinh" id="MaDonViTinh">
                                    @foreach ($DonViTinh as $item)
                                        <option value="{{ $item->id }}">{{ $item->TenDonViTinh }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="select-style-1">
                            <label for="MaMau">Màu</label>
                            <div class="select-position">
                                <select name="MaMau" id="MaMau">
                                    @foreach ($Mau as $item)
                                        <option value="{{ $item->id }}">
                                            <div class="color-1000"
                                                style="width: 20px;height: 20px; border-radius: 50%; background: {{ $item->TenMau }}">
                                            </div>
                                            {{ $item->MoTa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="select-style-1">
                            <label for="MaSize">Size</label>
                            <div class="select-position">
                                <select name="MaSize" id="MaSize">
                                    @foreach ($Size as $item)
                                        <option value="{{ $item->id }}">{{ $item->MoTa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Update" class=" main-btn success-btn-outline rounded-full btn-hover ">
                        <a href="/product" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@stop
