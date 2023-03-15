<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function payment_veify($KolPardakht)
    {
        $cart=auth()->user()->cart;
        if(count($cart->products)==0)
        {
            session()->flash('error','سبد خرید شما خالی است');
            return redirect()->back();
        }
        $order= new Order();
        $order->amount=$KolPardakht;
        $order->user_id=auth()->user()->id;
        $order->status=1;
        $order->save();
        foreach($cart->products as $product)
        {
            $order->products()->attach($product->id,['Tedad'=>$product->pivot->Tedad]);
        }
        session()->flash('error','سبد خر است');
        return redirect()->back();
    }
}
