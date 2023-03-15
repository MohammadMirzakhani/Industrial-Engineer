@extends('front.layout.master')

@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
        <li><a href="register.html">ثبت نام</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">ثبت نام حساب کاربری</h1>
          <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{ route('login') }}">صفحه لاگین</a> مراجعه کنید.</p>
          <form class="form-horizontal" action="{{ route('register') }}" method="POST">
            @csrf
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div style="display: none;" class="form-group required">
                <label class="col-sm-2 control-label">گروه مشتری</label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="1" name="customer_group_id">
                      پیشفرض</label>
                  </div>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="" name="name">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="last_name">
                </div>
              </div>
              <div class="form-group required">
                <label for="kodemeli" class="col-sm-2 control-label"> کد ملی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="kodemeli" placeholder="کد ملی" value="" name="national_code">
                </div>
              </div>
              <div class="form-group required">
                <label for="bank_number" class="col-sm-2 control-label"> شماره کارت</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="bank_number" placeholder="شماره کارت" value="" name="bank_number">
                </div>
              </div>
              <div class="form-group required">
                <label for="birthday" class="col-sm-2 control-label">تاریخ تولد</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="birthday" placeholder="تاریخ تولد" value="" name="birthday">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="" name="phone">
                </div>
              </div>
              <div class="form-group required">
                <label for="title" class="col-sm-2 control-label"> جنسیت</label><br>
            <div >
                <input type="radio" name="gender" class="btn-check" id="html"  value="1" >
                <label for="html" class="btn btn-outline-danger"> مرد</label>
                <input type="radio" name="gender" class="btn-check"  id="javascript"  value="2">
                <label for="javascript" class="btn btn-outline-success">زن </label>
            </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>آدرس</legend>
              <div class="form-group">
                <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-company" placeholder="شرکت" value="" name="company">
                </div>
              </div>
              <div class="form-group required">
                <label for="address" class="col-sm-2 control-label">آدرس </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" placeholder="آدرس " value="" name="address">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="" name="postcode">
                </div>
              </div>
              <div class="form-group required">
                <label for="province" class="col-sm-2 control-label">استان</label>
                <div class="col-sm-10">
                  <select class="form-control selectpicker" data-live-search="true" id="province" name="province">
                    <option value=""> --- لطفا انتخاب کنید --- </option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}"> {{ $province->name }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group required">
                <label for="city" class="col-sm-2 control-label">شهر</label>
                <div class="col-sm-10">
                  <select class="form-control selectpicker" data-live-search="true" id="city" name="city">
                    <option value=""> --- لطفا انتخاب کنید --- </option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}"> {{ $city->name }} ({{ $city->province->name }}) </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>رمز عبور شما</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" value="" name="password">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" value="" name="password_confirmation">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="checkbox" value="1" name="agree">
                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                <input type="submit" class="btn btn-primary" value="ادامه">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">حساب کاربری</h3>
          <div class="list-group">
            <ul class="list-item">
              <li><a href="login.html">ورود</a></li>
              <li><a href="register.html">ثبت نام</a></li>
              <li><a href="#">فراموشی رمز عبور</a></li>
              <li><a href="#">حساب کاربری</a></li>
              <li><a href="#">لیست آدرس ها</a></li>
              <li><a href="wishlist.html">لیست علاقه مندی</a></li>
              <li><a href="#">تاریخچه سفارشات</a></li>
              <li><a href="#">دانلود ها</a></li>
              <li><a href="#">امتیازات خرید</a></li>
              <li><a href="#">بازگشت</a></li>
              <li><a href="#">تراکنش ها</a></li>
              <li><a href="#">خبرنامه</a></li>
              <li><a href="#">پرداخت های تکرار شونده</a></li>
            </ul>
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
@endsection
