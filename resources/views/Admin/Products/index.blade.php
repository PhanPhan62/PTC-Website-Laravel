@extends('Admin.layoutadmin')
@section('title', 'Product')
@section('content_admin')

@if (Session::has('flash_message'))
    <div class="alert-box success-alert add-alert" style="position: absolute; top:0; right:0;">
        <div class="alert" >
            <p class="text-medium mb-0" style="width: 100%;">
                {{ Session::get('flash_message') }}
            </p>
        </div>
    </div> 
@endif

{{-- <select name="" id="">
    @foreach ($Cate as $item)
        <option value="{{$item->id}}">{{$item->TenLoaiSp}}</option>
    @endforeach
</select> --}}
<!-- ========== table components start ========== -->
<section class="table-components">
    <div class="container-fluid">
        <!-- ========== tables-wrapper start ========== -->
        <div class="tables-wrapper">  
            <div class="col-mr-3"> 
                <nav aria-label="breadcrumb">
                
                    <div class="breadcrumb-wrapper" style="height: 100%">
                        <ol class="breadcrumb" style="padding: 3px; background-color: #fff; margin-bottom: 0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Elements
                            </li>
                        </ol>
                    </nav>
                    <a href="{{route('create.product')}}" class="main-btn active-btn-outline rounded-md btn-hover" style="padding: 10px 25px; margin-bottom: 5px;">Add</a>
                    <a href="{{route('product')}}" class="main-btn active-btn-outline rounded-md btn-hover" style="padding: 10px 25px; margin-bottom: 5px;">Clear Search</a>
                    </div>
                </div>
            <!-- end col -->
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style"style="width:100%; padding:5px 30px">
                        <div class="table-wrapper table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr class="col-12">
                                        <th>
                                            <h6>STT</h6>
                                        </th>
                                        <th>
                                            <h6>Mã Sản phẩm</h6>
                                        </th>
                                        <th>
                                            <h6>Mã Loại</h6>
                                        </th>
                                        <th>
                                            <h6>Tên Sản Phẩm</h6>
                                        </th>
                                        <th>
                                            <h6>Mô Tả</h6>
                                        </th>
                                        <th>
                                            <h6>Ảnh đại diện</h6>
                                        </th>
                                        <th>
                                            <h6>Giá</h6>
                                        </th>
                                        <th>
                                            <h6>Nhà Sản Xuất</h6>
                                        </th>
                                        <th>
                                            <h6>Đơn Vị Tính</h6>
                                        </th>
                                        <th>
                                            <h6>Màu</h6>
                                        </th>
                                        <th>
                                            <h6>Size</h6>
                                        </th>
                                        <th>
                                            <h6>Hành Động</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    @foreach ($sanpham as $item)
                                        <tr>
                                            <td class="min-width">
                                                <p>{{ $loop->iteration }}</p>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text">
                                                        <p>{{$item->id}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->MaLoaiSP}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->TenSanPham}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        {{-- <p>{{Str::limit($item->MoTa, $max_length) }}</p> --}}
                                                        <div class="limit-item">
                                                            @if(strlen($item->MoTaSanPham) > $max_length)
                                                                <p style="text-transform: capitalize;">{!! Str::limit($item->MoTaSanPham, $max_length) !!}
                                                                    <span class="more">
                                                                        <a href="#" class="read-more">Xem thêm</a>
                                                                    </span>
                                                                </p>
                                                                <p style="display: none;text-transform: capitalize;">{!! $item->MoTaSanPham !!}</p>
                                                            @else
                                                                <p>{!! $item->MoTaSanPham !!}
                                                                    
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                            {{-- <img src="{{ asset('uploads/Pro_AV00011_2.jpg') }}" alt=""> --}}
                                                            <img style="height: 100px" src="{{ asset('uploads/'.$item->AnhDaiDien) }}" alt="{{$item->AnhDaiDien}}">
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{number_format($item->GiaBan)}} VNĐ</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->MaNSX}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->MaDonViTinh}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->MaMau}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->MaSize}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action" >
                                                    {{-- <a style="cursor: pointer" href="{{ url('/Product/show/' . $item->id) }}" class="text-dark mr-10"> --}}
                                                    <a style="cursor: pointer" href="{{ url('/product/show/' . $item->id) }}" class="text-dark mr-10">
                                                        <i class="lni lni-eye" title="View"></i>
                                                    </a>
                                                    {{-- <a style="cursor: pointer" href="{{route('edit.product', $item->id)}}" class="text-info  mr-10"> --}}
                                                    <a style="cursor: pointer" href="{{route('edit.product', $item->id)}}" class="text-info mr-10">
                                                        <i class="lni lni-write" title="Edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('destroy.product', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" onclick="return confirm('Bạn có thực sự muốn xóa {{ $item->TenSanPham }} hay không?')"><i class="lni lni-trash-can text-danger" > </i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- end table row -->
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                    <!-- end col -->
                    
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
    
</section>
<div aria-label="Page navigation"  class="d-flex justify-content-center">
    {!!$sanpham->appends(request()->all())->links()!!}
</div>

<!-- ========== table components end ========== -->


@endsection