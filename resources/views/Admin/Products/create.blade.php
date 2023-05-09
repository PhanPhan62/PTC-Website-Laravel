@extends('Admin.layoutadmin')
@section('title', 'Create')
@section('content_admin')
    <!-- ========== tab components start ========== -->
    <section class="tab-components">
        <!-- ========== title-wrapper start ========== -->
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @yield('title')
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
            <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <form action="{{ route('store.product') }}" class="col-lg-6 mx-auto" method="POST" enctype="multipart/form-data">
                    @csrf
                    {!! csrf_field() !!}
                    <!-- input style start -->
                    <div class="card-style mb-30" >
                        <h6 class="mb-25">@yield('title')</h6>
                        <div class="select-style-1">
                            <label for="MaLoaiSP">Loại</label>
                            <div class="select-position">
                                <select name="MaLoaiSP" id="MaLoaiSP">
                                    <option value="">------------- Chọn -------------</option>
                                    @foreach ($Cate as $item)
                                        <option value="{{$item->id}}">{{$item->TenLoaiSP}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="input-style-1">
                            <label for="TenSanPham">Tên Sản Phẩm</label>
                            <input type="text" name="TenSanPham" required placeholder="Tên Sản Phẩm" value="" id="TenSanPham"/>
                        </div>
                        <div class="input-style-1 ">
                            <label for="MoTaSanPham">Mô Tả</label>
                            <input type="text" name="MoTaSanPham" required value="" placeholder="Mô tả" id="MoTaSanPham"/>
                        </div>
                        
                        <div class="input-style-1 ">
                            <label for="AnhDaiDien">Ảnh Đại Diện</label>
                            <input type="file" name="AnhDaiDien" required value=""  id="AnhDaiDien"/>
                        </div>
                        {{-- Chọn nhiều ảnh --}}
                        {{-- <div class="input-style-1 ">
                            <label for="AnhDaiDien">Ảnh Đại Diện</label>
                            <input type="file" name="file[]" accept="image/*" multiple required value=""  id="AnhDaiDien"/>
                        </div> --}}
                        <div class="input-style-1 ">
                            <label for="GiaBan">Giá</label>
                            <input type="text" name="GiaBan" required value="" placeholder="Giá" id="GiaBan"/>
                        </div>
                        <div class="select-style-1">
                            <label for="MaNSX">Nhà Sản xuất</label>
                            <div class="select-position">
                                <select name="MaNSX" id="MaNSX">
                                    @foreach ($NhaSanXuat as $item)
                                        <option value="{{$item->id}}">{{$item->TenNSX}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="select-style-1">
                            <label for="MaDonViTinh">Đơn Vị Tính</label>
                            <div class="select-position">
                                <select name="MaDonViTinh" id="MaDonViTinh">
                                    @foreach ($DonViTinh as $item)
                                        <option value="{{$item->id}}">{{$item->TenDonViTinh}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="select-style-1">
                            <label for="MaMau">Màu</label>
                            <div class="select-position">
                                <select name="MaMau" id="MaMau">
                                    @foreach ($Mau as $item)
                                        <option value="{{$item->id}}">
                                            <div class="color-1000" style="width: 20px;height: 20px; border-radius: 50%; background: {{$item->TenMau}}"></div>
                                            {{$item->MoTa}}
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
                                        <option value="{{$item->id}}">{{$item->MoTa}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- end input -->
                        <input type="submit" value="Save"class=" main-btn success-btn-outline rounded-full btn-hover ">
                        <a href="/product" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
                    </div>
                </form>
            </div>
            <!-- end col -->
        </div>
        <!-- end container -->
    </section>

@stop
