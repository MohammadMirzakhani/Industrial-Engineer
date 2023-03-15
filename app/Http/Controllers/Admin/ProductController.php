<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\AttributeGroup;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::with('childrenRecursive')->where('parent_id',null)->get();
        $brands=Brand::all();
        $products=Product::all();
        return view('admin.products.create',['products'=>$products,'categories'=>$categories,'brands'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateSKU()
    {
        $number=mt_rand(1000,99999);
        if($this->checkSKU($number))
        {
            return $this->generateSKU();
        }
        else
        {
            return (string)$number;
        }
    }

    public function checkSKU($n)
    {
        return Product::where('sku',$n)->exists();
    }

    public function makeslug($string)
    {
        $string=strtolower($string);
        $string=str_replace(['؟','?'],'',$string);
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function store(Request $request)
    {
        //dd($request->file("AsliImageProduct"));
        $product = new Product;
        $product->sku=$this->generateSKU();
        $product->title=$request->title;
        $product->slug=$this->makeslug($request->slug);
        $product->status=$request->status;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->description=$request->description;
        $product->brand_id=$request->brand_id;
        $product->user_id=1;
        session()->flash('CreateProduct','محصول شما با موفقیت ذخیره شد');
        $product->save();
        $product->categories()->sync($request->categories);
        if($request->file('SayerImageProduct'))
        {
            foreach($request->file('SayerImageProduct') as $img)
            {
                $name=time().$img->getClientOriginalName();
                Storage::disk('local')->putFileAs('/public/products/Sayer/',$img,$name);
                $photo=new Photo();
                $photo->original_name=$img->getClientOriginalName();
                $photo->path=$name;
                $photo->user_id=1;
                $photo->save();
                $product->photos()->attach($photo->id);
            }
        }
        if($request->file('AsliImageProduct'))
        {
            $img=$request->file('AsliImageProduct');
            $name=time().$img->getClientOriginalName();
            Storage::disk('local')->putFileAs('/public/products/Asli/',$img,$name);
            $photo=new Photo();
            $photo->original_name=$img->getClientOriginalName();
            $photo->path=$name;
            $photo->user_id=1;
            $photo->save();
            $product->photos()->attach($photo->id,['IsAsli'=>1]);
        }
        return to_route('AttributValueForProduct',$product->id);
    }

    public function AttributValueForProduct(Product $product)
    {
        return view('admin.products.AttributValueForProduct',['product'=>$product]);
    }

    public function SaveAttributValueForProduct(Product $product,Request $request)
    {
        $product->attributevalues()->sync($request->l);
        session()->flash('product_attributevalue', 'مقادیر ویژگی با موفقیت برای محصول '.$product->title.' ذخیره شد');
        return to_route('product.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::with('childrenRecursive')->where('parent_id',null)->get();
        $brands=Brand::all();
        return view('admin.products.edit',['categories'=>$categories,'brands'=>$brands,'product'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->sku=$this->generateSKU();
        $product->title=$request->title;
        $product->slug=$this->makeslug($request->slug);
        $product->status=$request->status;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->description=$request->description;
        $product->brand_id=$request->brand_id;
        $product->user_id=1;
        session()->flash('CreateProduct','محصول شما با موفقیت ویرایش شد');
        $product->save();
        $product->categories()->sync($request->categories);
        if($request->file('SayerImageProduct'))
        {
            foreach($product->photos as $photom)
            {
                Storage::disk('public')->delete('/products/Sayer/'.$photom->path);
            }
            foreach($request->file('SayerImageProduct') as $img)
            {
                $name=time().$img->getClientOriginalName();
                Storage::disk('local')->putFileAs('/public/products/Sayer/',$img,$name);
                $photo=new Photo();
                $photo->original_name=$img->getClientOriginalName();
                $photo->path=$name;
                $photo->user_id=1;
                $photo->save();
                $product->photos()->attach($photo->id);
            }
        }
        if($request->file('AsliImageProduct'))
        {
            foreach($product->photos as $photom)
            {
                Storage::disk('public')->delete('/products/Asli/'.$photom->path);
                $product->photos()->detach($photom->id);
                $photom->delete();
            }
            $img=$request->file('AsliImageProduct');
            $name=time().$img->getClientOriginalName();
            Storage::disk('local')->putFileAs('/public/products/Asli/',$img,$name);
            $photo=new Photo();
            $photo->original_name=$img->getClientOriginalName();
            $photo->path=$name;
            $photo->user_id=1;
            $photo->save();
            $product->photos()->attach($photo->id,['IsAsli'=>1]);
        }
        return to_route('AttributValueForProduct',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach($product->photos as $photom)
        {
            Storage::disk('public')->delete('/products/Sayer/'.$photom->path);
            Storage::disk('public')->delete('/products/Asli/'.$photom->path);
            $photom->delete();
        }
        session()->flash('DeleteProduct','محصول شما با موفقیت حذف شد');
        $product->delete();
        return to_route('product.index');
    }
}
