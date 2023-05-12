<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\ProductModels;

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
    public function update(CartHelper $cart, $id, $quantity)
    {
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelper $cart, $id, $quantity)
    {
        $cart->clear($id, $quantity);
        return redirect()->back();
    }
}
