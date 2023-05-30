@extends('Admin.layoutadmin')
@section('title', 'Category')
@section('content_admin')

@if (Session::has('flash_message'))
    <div class="alert-box success-alert add-alert" style="position: absolute; top:0; right:0;">
        <div class="alert" >
            <p class="text-medium mb-0" style="width: 100%; coler:#fff">
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
        <div class="tables-wrapper pt-10">  
            <div class="col-mr-3"> 
                <nav aria-label="breadcrumb">
                
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb" style="">
                            <li class="breadcrumb-item">
                                <a href="#0">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Elements
                            </li>
                        </ol>
                    </nav>
                    <a href="{{ url('/category/create') }}" class="main-btn active-btn-outline rounded-md btn-hover" style="padding: 10px 25px; margin-bottom: 5px;">Add</a>
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
                                            <h6>Ngày Xuất</h6>
                                        </th>
                                        <th>
                                            <h6>Tên Loại</h6>
                                        </th>
                                        <th>
                                            <h6>Trạng thái</h6>
                                        </th>
                                        <th>
                                            <h6>Hành Động</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    @foreach ($hoadonxuat as $item)
                                        <tr>
                                            <td class="min-width">
                                                <p>{{ $loop->iteration }}</p>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text">
                                                        <p>{{$item->NgayXuat}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text" >
                                                        <p>{{$item->TenLoaiSP}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <p>{!! $item->TrangThai ? 'Đang hoạt động <i class="lni lni-checkmark-circle text-success"></i
                                                    > ' : 'Ngưng hoạt động <i class="lni lni-spinner text-danger"></i> '!!}</a></p>
                                            </td>
                                            <td>
                                                <div class="action" >
                                                    <a style="cursor: pointer" href="{{ url('/category/show/' . $item->id) }}" class="text-dark mr-10">
                                                        <i class="lni lni-eye" title="View"></i>
                                                    </a>
                                                    <a style="cursor: pointer" href="{{route('edit.category', $item->id)}}" class="text-info  mr-10">
                                                        <i class="lni lni-write" title="Edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('destroy.category', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" onclick="return confirm('Bạn có thực sự muốn xóa {{ $item->TenLoaiSP }} hay không?')"><i class="lni lni-trash-can text-danger" > </i></button>
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

    {{$hoadonxuat->appends(request()->all())->links()}}
</div>

<!-- ========== table components end ========== -->


@endsection