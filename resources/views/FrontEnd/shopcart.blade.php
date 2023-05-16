@extends('FrontEnd.layout')
@section('title', 'Shop Cart')
@section('content')
    <!-- Shoping Cart -->
    <div class="bg0 p-t-75">
        @if ($cart->checkCart)
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart" style="">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1"style="text-align: center">Product</th>
                                        <th class="column-2"style="text-align: center"></th>
                                        <th class="column-3"style="text-align: center">Price</th>
                                        <th class="column-4"style="text-align: center">Quantity</th>
                                        <th class="column-5"style="text-align: center;margin-left:20px">Total</th>
                                        <th class="column-5"style="text-align: center; padding-right: 20px ">Action</th>
                                    </tr>

                                    @foreach ($cart->items as $item)
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="{{ route('removeCart', ['id' => $item['id']]) }}">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset('/uploads') }}/{{ $item['AnhDaiDien'] }}"
                                                            alt="{{ $item['TenSanPham'] }}">
                                                    </div>
                                                </a>

                                            </td>
                                            <td class="column-2">{{ $item['TenSanPham'] }}</td>
                                            <td class="column-3">
                                                {{ number_format(floatval($item['GiaBan']), 0, ',', '.') . ' VNĐ' }}
                                            </td>
                                            <form action="{{ route('updateCart', ['id' => $item['id']]) }}" method="get">
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="quantity" value="{{ $item['quantity'] }}">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="column-5"style="padding-right:30px">
                                                    {{ number_format($cart->get_price_of_item($item['id'])) . ' VNĐ' }}
                                                </td>
                                                <td class="column-6">
                                                    <input type="submit"
                                                        class=" stext-101 cl2 size-11 bg8 bor13 hov-btn3 p-lr-15  pointer "
                                                        value="Update">
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="header-cart-total" style="margin-left:10%; color: red">
                                <p style="font-weight: 900">Total: {{ number_format($cart->total_price) . ' VNĐ' }}</p>
                            </div>
                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm fff">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                        name="coupon" placeholder="Coupon Code">

                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Apply coupon
                                    </div>
                                </div>

                                <a class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn p-lr-15 aaa trans-04 pointer m-tb-5"
                                    href="{{ route('clearCart') }}">
                                    <div>
                                        Clear All
                                    </div>
                                </a>
                             

                            </div>
                        </div>

                    </div>

                </div>
                <form class="bg0 p-t-75" method="POST" action="{{route('postcheckout')}}">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7 col-lg-7 col-xl-7 m-lr-auto m-b-50">
                                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                                    <h4 class="mtext-109 cl2 p-b-30">
                                        Thông tin khách hàng
                                    </h4>
                
                
                                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                        <div class="size-207 w-full-ssm">
                                            <span class="stext-110 cl2">
                                                Order:
                                            </span>
                                        </div>
                
                                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                            <div class="p-t-15">
                                                <span class="stext-112 cl8">
                                                    Tên Khách hàng
                                                </span>
                                                <div class="bor8 bg0 m-b-12">
                                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="TenKhachHang" placeholder="Tên Khách hàng">
                                                </div>
                                                <span class="stext-112 cl8">
                                                    Địa chỉ
                                                </span>
                                                <div class="bor8 bg0 m-b-12">
                                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="DiaChi" placeholder="Địa chỉ">
                                                </div>
                                                <span class="stext-112 cl8">
                                                    Số Siện thoại
                                                </span>
                                                <div class="bor8 bg0 m-b-12">
                                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="SoDienThoai" placeholder="Số Điện thoại">
                                                </div>
                                                <span class="stext-112 cl8">
                                                    Email
                                                </span>
                                                <div class="bor8 bg0 m-b-12">
                                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="flex-w flex-t p-t-27 p-b-33">
                                        <div class="size-208">
                                            <span class="mtext-101 cl2">
                                                Total:
                                            </span>
                                        </div>
                
                                        <div class="size-209 p-t-1">
                                            <span class="mtext-101 cl2">
                                                {{number_format($cart->total_price).' VNĐ'}}
                                            </span>
                                        </div>
                                    </div>
                                    <div style="display:flex">
                                        <a href="{{route('shopcart')}}" style="margin-right: 30px">
                                            <div class="flex-w">
                                                <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                                    Back
                                                </div>
                                            </div>
                                        </a>
                
                                        <a href="" style="margin-right: 30px">
                                            <button class="flex-w">
                                                <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="color:#fff; background: #222">
                                                    Pay
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @else

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm fff">

                            <img src="{{ asset('images/empty-cart.webp') }}" alt="">
                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 ">
                                <a href="{{ route('home') }}">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
