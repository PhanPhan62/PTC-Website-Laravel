<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\ProductModels;
use App\Models\CTHoaDonModels;
use App\Models\KhachHangModels;
use App\Models\DonHangModels;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function add(CartHelper $cart, $id)
    {
        $product = ProductModels::find($id);
        $cart->add($product);
        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, $id, Request $request)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
    public function CheckCart(CartHelper $cart)
    {
        $cartHelper = new CartHelper();
        if ($cartHelper->checkCart()) {
            return redirect()->route('shopcart');
        }
    }
    public function checkout(CartHelper $cart, Request $request)
    {
        $customer = KhachHangModels::create($request->all());

        $order = new DonHangModels;
        $order->MaKhachHang = $customer->id;
        $order->NgayDat = Carbon::now();
        $order->TrangThaiDonHang = 1;
        $order->TongTien = $cart->total_price;
        // dd($order->TongTien);
        $order->save();

        foreach ($cart->items as $item) {
            $orderdetail = new CTHoaDonModels;
            $orderdetail->MaDonHang = $order->id;
            $orderdetail->MaSanPham = $item['id'];
            $orderdetail->SoLuong = $item['quantity'];
            $orderdetail->GiaMua = $item['GiaBan'];
            $orderdetail->save();
        }
        // dd($cart);
        $cart->clear();
        return redirect()->back();
    }
}
