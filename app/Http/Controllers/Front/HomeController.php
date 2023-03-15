<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AlbaseCategoryProducts=Product::get();
        //dd($AlbaseCategoryProducts);

        $Lastproducts=Product::orderby('id','desc')->limit(12)->get();
        $brands=Brand::all();
        $categories=Category::with('products')->get();
        $KolePoll=0;
        $KolPardakht=0;
        $Number=0;
        if(Auth::check())
        {
            $cart=auth()->user()->cart;
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
        else
        {
            $Number=null;
            $cart=null;
            $KolPardakht=null;
            $KolePoll=null;
        }
        return view('front.Home.Home',['Lastproducts'=>$Lastproducts,'brands'=>$brands,'categories'=>$categories,'AlbaseCategoryProducts'=>$AlbaseCategoryProducts,'cart'=>$cart,'KolPardakht'=>$KolPardakht,'KolePoll'=>$KolePoll,'Number'=>$Number]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
