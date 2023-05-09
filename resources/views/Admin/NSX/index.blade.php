@extends('Admin.layoutadmin')
@section('title', 'NSX')
@section('content_admin')

@if (Session::has('flash_message'))
<div class="alert-box success-alert " style="width:100%; z-index: 999;position: absolute; top:0; left:50%; transform: translateX(-50%)">

    <div class="left">
        <h5 class="text-bold">Success</h5>
    </div>
    <div class="alert">
        <h4 class="alert-heading" style="width:100%; z-index: 999;margin-left:50%;transform: translateX(-10%);">#D50100</h4>
        <p class="text-medium" style="width:100%; z-index: 999;margin-left:50%;transform: translateX(-10%);">
            {{ Session::get('flash_message') }}
        </p>
    </div>
</div>
    {{-- <script>
        alert('{{ Session::get('flash_message') }}');
    </script> --}}
@endif
<!-- ========== table components start ========== -->
<section class="table-components">
    <div class="container-fluid">

        <!-- ========== tables-wrapper start ========== -->
        <div class="tables-wrapper ">  
            <div class="col-mr-3"> 
                <nav aria-label="breadcrumb">
                
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb"style="padding: 3px; background-color: #fff; margin-bottom: 0">
                            <li class="breadcrumb-item">
                                <a href="#0">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Elements
                            </li>
                        </ol>
                    </nav>
                    <a href="{{ url('/nhasanxuat/create') }}" class="main-btn active-btn-outline rounded-md btn-hover" style="padding: 10px 25px; margin-bottom: 5px;">Add</a>
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
                                            <h6>Mã @yield('title')</h6>
                                        </th>
                                        <th>
                                            <h6>Tên @yield('title')</h6>
                                        </th>
                                        <th>
                                            <h6>SĐT</h6>
                                        </th>
                                        <th>
                                            <h6>Email</h6>
                                        </th>
                                        <th>
                                            <h6>Mô Tả</h6>
                                        </th>
                                        <th>
                                            <h6>Hành Động</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    @foreach ($nhasanxuat as $item)
                                        <tr>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text">
                                                        <p>{{ $loop->iteration }}</p>
                                                    </div>
                                                </div>
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
                                                        <p >{{$item->TenNSX}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p >{{$item->SoDienThoai}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p >{{$item->Email}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        {{-- <p>{{Str::limit($item->MoTa, $max_length) }}</p> --}}
                                                        <div class="limit-item">
                                                            @if(strlen($item->MoTa) > $max_length)
                                                                <p style="text-transform: capitalize;">{!! Str::limit($item->MoTa, $max_length) !!}
                                                                    <span class="more">
                                                                        <a href="#" class="read-more">Xem thêm</a>
                                                                    </span>
                                                                </p>
                                                                <p style="display: none;text-transform: capitalize;">{!! $item->MoTa !!}</p>
                                                            @else
                                                                <p>{!! $item->MoTa !!}
                                                                    {{-- <span class="more">
                                                                        <a href="#" class="read-more">Ẩn</a>
                                                                    </span> --}}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action" >
                                                    <a style="cursor: pointer" href="{{ url('/nhasanxuat/show/' . $item->id) }}" class="text-dark mr-10">
                                                        <i class="lni lni-eye" title="View"></i>
                                                    </a>
                                                    <a style="cursor: pointer" href="{{route('edit.nhasanxuat', $item->id)}}" class="text-info  mr-10">
                                                        <i class="lni lni-write" title="Edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('destroy.nhasanxuat', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" onclick="return confirm('Bạn có thực sự muốn xóa {{ $item->MoTa }} hay không?')"><i class="lni lni-trash-can text-danger" > </i></button>
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
    
    {{-- {!!$loaisp->Links("Admin.Categories.index")!!} --}}
    {{-- {{ $loaisp->render('Admin.Categories.index')->onEachSide(1)->links() }} --}}

    {{$nhasanxuat->appends(request()->all())->links()}}
</div>

<!-- ========== table components end ========== -->

@endsection