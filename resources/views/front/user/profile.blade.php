@extends('front.layout.master')
@section('sabad')
<button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
    <span class="cart-icon pull-left flip"></span>
    <span id="cart-total">{{ $Number }} آیتم - {{$KolPardakht  }} تومان</span>
</button>
<ul class="dropdown-menu">
    <li>
      <table class="table">
        <tbody>
            @if ($cart)
                @foreach ($cart->products as $product)
                <tr>
                    <td class="text-center">
                        @if (count($product->photos)>0)
                            @foreach ($product->photos as $photo)
                                @if ($photo->pivot->IsAsli==1)
                                <a href="product.html">
                                    <img class="img-thumbnail" width="80px" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}">
                                </a>
                                @else
                                @endif
                            @endforeach
                        @else
                            <a href="product.html">
                                <img class="img-thumbnail" width="80px" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="{{ asset('/storage/products/Sayer/1657529749formal-men-shirt-17.jpg') }}">
                            </a>
                        @endif
                    </td>
                    <td class="text-left"><a href="product.html">{{ $product->title }}</a></td>
                    <td class="text-right">x {{ $product->pivot->Tedad }}</td>
                    <td class="text-right">
                        @if ($product->discount_price)
                        <p class="price"><span class="price-new">{{ $product->discount_price }} تومان</span> <span class="price-old">{{ $product->price }} تومان</span></p>
                        @else
                        <p class="price"> {{ $product->price }}</p>
                        @endif
                    </td>
                    <td class="text-center"><a href="{{ route('RemoveProductFromCart',[$product->id,auth()->user()->id]) }}">❌</a></td>
                </tr>
                @endforeach
            @endif
        </tbody>
      </table>
    </li>
    <li>
      <div>
        <table class="table table-bordered">
          <tbody>
            <tr>
                <td class="text-right"><strong>جمع کل</strong></td>
                <td class="text-right">{{ $KolePoll }} تومان</td>
            </tr>
            <tr>
                <td class="text-right"><strong>کسر تخفیف</strong></td>
                <td class="text-right">{{$KolePoll-$KolPardakht  }} تومان</td>
            </tr>
            <tr>
                <td class="text-right"><strong>قابل پرداخت</strong></td>
                <td class="text-right">{{$KolPardakht  }} تومان</td>
            </tr>
          </tbody>
        </table>
        <p class="checkout"><a href="{{ route('getcart',auth()->user()->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a></p>
      </div>
    </li>
  </ul>

@endsection
@section('content')
<div id="container">
    <div class="container">
        <div class="alert alert-warning"><p>  به حساب کاربری خود خوش آمدی ({{ $user->name }})</p></div>
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">حساب کاربری </h1>
          <aside id="column-right" class="col-sm-3 hidden-xs">
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
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->

        <!--Right Part End -->
      </div>
    </div>
  </div>
@endsection
