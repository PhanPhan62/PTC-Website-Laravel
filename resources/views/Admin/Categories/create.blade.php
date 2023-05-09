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
                            <h2>Form Elements</h2>
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
                <form action="{{ route('store.categorry') }}" class="col-lg-6 mx-auto" method="POST">
                    {!! csrf_field() !!}
                    <!-- input style start -->
                    <div class="card-style mb-30" >
                        <h6 class="mb-25">@yield('title')</h6>
                        <div class="input-style-1">
                            <label>Tên Loại</label>
                            <input type="text" name="TenLoaiSP" required id="name" placeholder="Tên Loại" />
                        </div>
                        {{-- <div class="input-style-1">
                            <label>Tên Loại</label>
                            <input type="text" name="TrangThai" id="TrangThai" placeholder="Tên Loại" />
                        </div> --}}
                        <div class="select-style-1">
                            <label>Trạng thái</label>
                            <div class="select-position">
                                <select name="TrangThai">
                                    <option value="1">Đang hoạt động</option>
                                    <option value="0">Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Save"class=" main-btn success-btn-outline rounded-full btn-hover ">
                        <a href="/category" class=" main-btn danger-btn-outline rounded-full btn-hover ">Back</a>
                    </div>
                </form>
            </div>
            <!-- end col -->
        </div>
        <!-- end container -->
    </section>

@stop
