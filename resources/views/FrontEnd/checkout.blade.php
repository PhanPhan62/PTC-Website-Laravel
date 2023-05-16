@extends('FrontEnd.layout')
@section('title', 'Shop Cart')
@section('content')
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75" method="POST" action="{{route('postcheckout')}}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-9 col-xl-9 m-lr-auto m-b-50">
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
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="TenKhachHang"
                                            placeholder="Tên Khách hàng">
                                    </div>
                                    <span class="stext-112 cl8">
                                        Địa chỉ
                                    </span>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="DiaChi"
                                            placeholder="Địa chỉ">
                                    </div>
                                    <span class="stext-112 cl8">
                                        Số Siện thoại
                                    </span>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="SoDienThoai"
                                            placeholder="Số Điện thoại">
                                    </div>
                                    <span class="stext-112 cl8">
                                        Email
                                    </span>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Email"
                                            placeholder="Email">
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
                                    <div
                                        class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Back
                                    </div>
                                </div>
                            </a>
    
                            <a href="" style="margin-right: 30px">
                                <div class="flex-w">
                                    <div
                                        class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="color:#fff; background: #222">
                                        Pay
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
