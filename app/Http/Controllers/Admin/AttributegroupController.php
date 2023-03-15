<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributegroup;
use PhpParser\Node\AttributeGroup as NodeAttributeGroup;

class AttributegroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $Attributegroups=Attributegroup::paginate(10);
        return view('admin.attribute.index',['Attributegroups'=>$Attributegroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Attributegroup=new Attributegroup();
        $Attributegroup->title=$request->title;
        $Attributegroup->type=$request->type;
        $Attributegroup->save();
        session()->flash('NewAttributeGroup','ویژگی جدید با موفقیت ساخته شد');
        return to_route('Attributegroup.index');
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
    public function edit(AttributeGroup $Attributegroup)
    {
        return view('admin.attribute.edit',compact('Attributegroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeGroup $Attributegroup)
    {
        $Attributegroup->title=$request->title;
        $Attributegroup->type=$request->type;
        $Attributegroup->save();
        session()->flash('UpdateAttributeGroup','ویژگی( ' .$Attributegroup->title.') با موفقیت بروزرسانی شد');
        return to_route('Attributegroup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeGroup $Attributegroup)
    {
        $Attributegroup->delete();
        session()->flash('DeleteAttributeGroup','ویژگی(' .$Attributegroup->title.') با موفقیت حذف شد');
        return to_route('Attributegroup.index');
    }
}
