<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::paginate(10);
        return Storage::download('1655032917BRANDf0674176.jpg');
        //return view('admin.brands.index',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required',Rule::unique('brands')],
            'description' => ['required'],
            'ImageBrand'=>['required'],
        ]);
            $brand = new Brand();
            $brand->title = $request->input('title');
            $brand->description = $request->input('description');
            $file=$request->file('ImageBrand');
            $name=time()."BRAND".$file->getClientOriginalName();
            Storage::disk('local')->putFileAs('/public/photos/',$file,$name);
            //$file->move('Images/Brands',$name);
            $photo=new Photo();
            $photo->original_name=$file->getClientOriginalName();
            $photo->path=$name;
            $photo->user_id=1;
            $photo->save();
            $brand->photo_id=$photo->id;
            $brand->save();
            Session::flash('success', 'برند با موفقیت ذخیره شد');
            return to_route('brands.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'title' => ['required',Rule::unique('brands')->ignore($brand->id)],
            'description' => ['required'],
        ]);
            if ($request->file('ImageBrand'))
            {
                Storage::disk('local')->delete('/public/photos/'.$brand->photo->path);
                $file=$request->file('ImageBrand');
                $name=time()."BRAND".$file->getClientOriginalName();
                Storage::disk('local')->putFileAs('/public/photos/',$file,$name);
                $photo=new Photo();
                $photo->original_name=$file->getClientOriginalName();
                $photo->path=$name;
                $photo->user_id=1;
                $photo->save();
                $brand->photo_id=$photo->id;
            }
            $brand->title = $request->input('title');
            $brand->description = $request->input('description');
            $brand->save();
            Session::flash('success', 'برند با موفقیت ویرایش شد');
            return to_route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Storage::disk('local')->delete('/public/photos/'.$brand->photo->path);
        $brand->photo->delete();
        $brand->delete();
        session()->flash('delete',' برند('.$brand->title.') با موفقیت حذف شد ');
        return to_route('brands.index');
    }
}
