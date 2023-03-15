<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddProductToCart(Product $product,User $user)
    {
        $cart=$user->cart;
        if(count($cart->products)>0)
        {
            if($cart->products->contains('id',$product->id))
            {
                foreach($cart->products as $mahsool)
                {
                    if($cart->products->contains('id',$product->id))
                    {
                        $cart->products()->detach($product->id);
                        $mahsool->pivot->Tedad+=1;
                        if($product->discount_price)
                        {
                            $TotalTakhfif=($mahsool->pivot->Tedad)*($product->price-$product->discount_price);
                        }
                        else
                        {
                            $TotalTakhfif=0;
                        }
                        $cart->products()->attach($product->id,['Tedad'=>$mahsool->pivot->Tedad,'TotalPrice'=>($mahsool->pivot->Tedad)*($mahsool->price),'TotalTakhfif'=>$TotalTakhfif]);
                    }
                }
            }
            else
            {
                if($product->discount_price)
                {
                    $TotalTakhfif=$product->price-$product->discount_price;
                }
                else
                {
                    $TotalTakhfif=0;
                }
                $cart->products()->attach($product->id,['Tedad'=>1,'TotalPrice'=>$product->price,'TotalTakhfif'=>$TotalTakhfif]);
            }
        }
        else
        {
            if($product->discount_price)
            {
                $TotalTakhfif=$product->price-$product->discount_price;
            }
            else
            {
                $TotalTakhfif=0;
            }
            $cart->products()->attach($product->id,['Tedad'=>1,'TotalPrice'=>$product->price,'TotalTakhfif'=>$TotalTakhfif]);
        }
        session()->flash('AddProduct','محصول مورد نظر با موفقیت به سبد خرید شما اضافه شد');
        return redirect()->back();
    }
    public function RemoveProductFromCart(Product $product,User $user)
    {
        $cart=$user->cart;
        foreach($cart->products as $mahsool)
        {
            if($mahsool->id==$product->id)
            {
                $mahsool->pivot->Tedad-=1;
                if($mahsool->pivot->Tedad>0)
                {
                    $cart->products()->detach($product->id);
                    if($product->discount_price)
                    {
                        $TotalTakhfif=($mahsool->pivot->Tedad)*($product->price-$product->discount_price);
                    }
                    else
                    {
                        $TotalTakhfif=0;
                    }
                    $cart->products()->attach($product->id,['Tedad'=>$mahsool->pivot->Tedad,'TotalPrice'=>($mahsool->pivot->Tedad)*($mahsool->price),'TotalTakhfif'=>$TotalTakhfif]);
                }
                else
                {
                    $cart->products()->detach($product->id);
                }
            }
        }
        session()->flash('RemoveProduct','محصول مورد نظر با موفقیت از سبد خرید شما کم شد');
        return redirect()->back();
    }
    public function getcart()
    {
        $user=auth()->user();
        $d=$user->coupons->contains('code',$user->cart->code_coupon);
        if (!$d)
        {
            $user->cart->code_coupon=null;
            $user->cart->price_coupon=0;
            $user->cart->AboveOf=0;
            $user->cart->save();
        }
        $KolePoll=0;
        $KolPardakht=0;
        $Number=0;
        $cart=auth()->user()->cart;
        if(count($cart->products)>0)
        {
            foreach($cart->products as $product)
            {
                $Number+=$product->pivot->Tedad;
                if($product->discount_price)
                {
                    $KolPardakht+=($product->pivot->Tedad)*($product->discount_price);
                }
                else
                {
                    $KolPardakht+=($product->pivot->Tedad)*($product->price);
                }
                    $KolePoll+=($product->pivot->Tedad)*($product->price);
            }
        }
        return view('front.Cart.index',compact('KolePoll','KolPardakht','Number','cart'));
    }
    public function PlusProduct(Product $product,User $user)
    {
        $cart=$user->cart;
        foreach($cart->products as $mahsool)
        {
            if($mahsool->id==$product->id)
            {
                $mahsool->pivot->Tedad+=1;
                if($product->discount_price)
                {
                    $TotalTakhfif=($mahsool->pivot->Tedad)*($product->price-$product->discount_price);
                }
                else
                {
                    $TotalTakhfif=0;
                }
                $cart->products()->detach($product->id);
                $cart->products()->attach($product->id,['Tedad'=>$mahsool->pivot->Tedad,'TotalPrice'=>($mahsool->pivot->Tedad)*($product->price),'TotalTakhfif'=>$TotalTakhfif]);
            }
        }
        session()->flash('AddProduct','محصول مورد نظر با موفقیت به سبد خرید شما اضافه شد');
        return redirect()->back();
    }
    public function MinusProduct(Product $product,User $user)
    {
        $cart=$user->cart;
        foreach($cart->products as $mahsool)
        {
            if($mahsool->id==$product->id)
            {
                $mahsool->pivot->Tedad-=1;
                if($mahsool->pivot->Tedad>0)
                {
                    $cart->products()->detach($product->id);
                    if($product->discount_price)
                    {
                        $TotalTakhfif=($mahsool->pivot->Tedad)*($product->price-$product->discount_price);
                    }
                    else
                    {
                        $TotalTakhfif=0;
                    }
                    $cart->products()->attach($product->id,['Tedad'=>$mahsool->pivot->Tedad,'TotalPrice'=>($mahsool->pivot->Tedad)*($mahsool->price),'TotalTakhfif'=>$TotalTakhfif]);
                }
                else
                {
                    $cart->products()->detach($product->id);
                }
            }
        }
        session()->flash('RemoveProduct','محصول مورد نظر با موفقیت از سبد خرید شما کم شد');
        return redirect()->back();
    }
}
