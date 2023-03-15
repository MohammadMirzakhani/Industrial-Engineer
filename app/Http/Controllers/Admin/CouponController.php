<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::paginate(10);
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon=new Coupon;
        $coupon->title=$request->title;
        $coupon->code=$request->code;
        $coupon->price=$request->price;
        $coupon->AboveOf=$request->AboveOf;
        $coupon->status=$request->status;
        $coupon->save();
        session()->flash('success','کد تخفیف با موفقیت ذخیره شد');
        return to_route('coupons.index');

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
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Coupon $coupon)
    {
        $coupon->title=$request->title;
        $coupon->code=$request->code;
        $coupon->price=$request->price;
        $coupon->AboveOf=$request->AboveOf;
        $coupon->status=$request->status;
        $coupon->save();
        session()->flash('success','کد تخفیف با موفقیت ویرایش شد');
        return to_route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        session()->flash('delete','کد تخفیف با موفقیت حذف شد');
        return to_route('coupons.index');
    }
}
