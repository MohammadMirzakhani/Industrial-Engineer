<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function coupon_add(Request $request)
    {   //بررسی میکنیم اگه کد تخفیف برای کاربر وجود نداشت یعنی کاربر از کد تخفیف استفاده نکرده و کد تخفیف براش ذخیره میشه تا نتونه دوباره ازش استفاده کنه
        // $check=auth()->user()->whereHas('coupons',function($q) use($request){
        //     $q->where('code',$request->code);
        // })->exists();
        $check=0;
        if (count(auth()->user()->coupons)>0)
        {
            foreach(auth()->user()->coupons as $coupon)
            {
                if ($coupon->code==$request->code) {
                    $check=1;
                    break;
                }
            }
        }
       if (!$check)
       {
           $coupon=Coupon::where('code',$request->code)->where('status',1)->first();
           $pardakhti=0;
           $cart=auth()->user()->cart;
           if ($coupon)
           {
                foreach($cart->products as $product)
                {
                    if($product->discount_price)
                    {
                        $pardakhti+=($product->pivot->Tedad)*($product->discount_price);
                    }
                    else
                    {
                        $pardakhti+=($product->pivot->Tedad)*($product->price);
                    }
                }
                if ($pardakhti > $coupon->AboveOf)
                {
                    session()->flash('error','کد تخفیف با موفقیت اعمال گردید');
                    $user=auth()->user();
                    $cart=$user->cart;
                    $cart->code_coupon=$coupon->code;
                    $cart->price_coupon=$coupon->price;
                    $cart->AboveOf=$coupon->AboveOf;
                    $cart->save();
                    $user->coupons()->attach($coupon->id);
                    return to_route('getcart');
                }
                else
                {
                    session()->flash('error','هزینه سبد خرید شما باید بیش از  ('.$coupon->AboveOf.')باشد ');
                    return to_route('getcart');
                }
           }
           else
           {
            session()->flash('error','کد تخفیف نادرست است');
            return to_route('getcart');
           }
       }
       else
       {
           session()->flash('error','شما قبلا از کد تخفیف استفاده کرده ای');
           return to_route('getcart');
       }

    }
}
