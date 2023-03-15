<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributegroup;
use App\Models\Attributevalue;
use Illuminate\Http\Request;

class AttributevalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Attributevalues=Attributevalue::paginate(10);
        return view('admin.attribute_value.index',['Attributevalues'=>$Attributevalues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Attributegroups=Attributegroup::all();
        return view('admin.attribute_value.create',['Attributegroups'=>$Attributegroups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Attributevalue=new Attributevalue();
        $Attributevalue->title=$request->title;
        $Attributevalue->attributegroup_id=$request->Attributegroup;
        $Attributevalue->save();
        session()->flash('NewAttributeValue','مقدار ویژگی برای ('.$Attributevalue->attributegroup->title.') با موفقیت ساخته شد');
        return to_route('Attributevalue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attributevalue  $attributevalue
     * @return \Illuminate\Http\Response
     */
    public function show(Attributevalue $attributevalue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attributevalue  $attributevalue
     * @return \Illuminate\Http\Response
     */
    public function edit(Attributevalue $Attributevalue)
    {
        $Attributegroups=Attributegroup::all();
        return view('admin.attribute_value.edit',['Attributegroups'=>$Attributegroups,'Attributevalue'=>$Attributevalue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attributevalue  $attributevalue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attributevalue $Attributevalue)
    {
        $Attributevalue->title=$request->title;
        $Attributevalue->attributegroup_id=$request->Attributegroup;
        $Attributevalue->save();
        session()->flash('UpdateAttributeValue','مقدار ویژگی ('.$Attributevalue->title.') برای ('.$Attributevalue->attributegroup->title.') با موفقیت بروزرسانی شد');
        return to_route('Attributevalue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attributevalue  $attributevalue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attributevalue $Attributevalue)
    {
        $Attributevalue->delete();
        session()->flash('DeleteAttributeValue',' مقدار ویژگی (' .$Attributevalue->title.') با موفقیت حذف شد');
        return to_route('Attributevalue.index');
    }
}
