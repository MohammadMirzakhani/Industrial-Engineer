<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Attributegroup;
use App\Models\Brand;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::where('parent_id',null)->paginate(10);
        return view('admin.categories.index',compact('categories'));
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
        return view('admin.categories.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->parent_id=$request->category_parent;
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keyword=$request->meta_keyword;
        $category->save();
        return to_route('category.index');
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
    public function edit(Category $category)
    {
        $categories=Category::with('childrenRecursive')->where('parent_id',null)->get();
        $brands=Brand::all();
        return view('admin.categories.edit',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $category->name=$request->name;
        $category->parent_id=$request->category_parent;
        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keyword=$request->meta_keyword;
        $category->save();
        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(count($category->children))
        {
            session()->flash('parent-erorr',' دسته بندی ('.$category->name.') حاوی زیر دسته است بنابراین حذف آن امکانپذیر نمیباشد');
        }
        else
        {
            session()->flash('delete',' دسته بندی مورد نظر حذف گردید');
            $category->delete();
        }
        return to_route('category.index');
    }
    public function CreateCategoryAttribute(Category $category)
    {
        $attributegroups=Attributegroup::all();
        return view('admin.categories.CreateCategoryAttribute',compact('attributegroups','category'));
    }
    public function SaveCategoryAttribute(Request $request,Category $category)
    {
        $category->attributegroups()->sync($request->category_attributegroup);
        session()->flash('ok','ویژگی های جدید با موفقیت برای دسته بندی '.$category->name.' ذخیره شدند ');
        return to_route('category.index');
    }
    public function api_index()
    {
        $categories=Category::get();
        $response=[
            'categories'=>$categories,
        ];
        return response()->json($response,200);
    }
}
