<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ShowProduct(Product $product)
    {
        // $relatedProducts = Product::with(['brand' => function ($query)  {
        //     $query->where('title', 'نایک');
        // }])->get();
        // dd($relatedProducts);
        $KolePoll=0;
        $KolPardakht=0;
        $Number=0;
        if(Auth::check())
        {
            $cart=auth()->user()->cart;
            foreach($cart->products as $productd)
            {
                $Number+=$productd->pivot->Tedad;
                if($productd->discount_price)
                {
                $KolPardakht+=($productd->pivot->Tedad)*($productd->discount_price);
                }
                else
                {
                $KolPardakht+=($productd->pivot->Tedad)*($productd->price);
                }
                $KolePoll+=($productd->pivot->Tedad)*($productd->price);
            }
        }
        else
        {
            $Number=null;
            $cart=null;
            $KolPardakht=null;
            $KolePoll=null;
        }
        return view('front.product.product',['cart'=>$cart,'KolPardakht'=>$KolPardakht,'KolePoll'=>$KolePoll,'Number'=>$Number,'product'=>$product]);
    }
    public function compare(Product $product)
    {
        $products=Product::all();
        return view('front.product.compare',compact('product','products'));
    }
    public function comparewith(Product $product1,Product $product2)
    {
       return view('front.product.comparewith',compact('product1','product2'));
    }
    public function category_products(Category $category,$page=10)
    {
        $products = Product::with('photos')
    ->whereHas('categories', function($q) use($category){
        $q->where('categories.id', $category->id);
    })->paginate($page);
        return view('front.product.category_products',compact('category','products'));
    }
}
