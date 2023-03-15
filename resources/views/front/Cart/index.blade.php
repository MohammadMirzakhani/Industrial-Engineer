@extends('front.layout.master')
@section('sabad')
@auth()
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

@endauth

@endsection
@section('content')
<div id="container">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-info"><b>{{ session('error') }}</b></div>
        @endif
        @if (session('RemoveProduct'))
            <div class="alert alert-danger"><b>{{ session('RemoveProduct') }}</b></div>
        @endif
        @if (session('AddProduct'))
            <div class="alert alert-success"><b>{{ session('AddProduct') }}</b></div>
        @endif
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-left">نام محصول</td>
                    <td class="text-left">کد محصول</td>
                    <td class="text-left">برند</td>
                    <td class="text-left">تعداد</td>
                    <td class="text-right">قیمت واحد</td>
                    <td class="text-right">کل</td>
                  </tr>
                </thead>
                <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        @if (count($product->photos)>0)
                            @foreach ($product->photos as $photo)
                                    @if ($photo->pivot->IsAsli==1)
                                    <td class="text-center">
                                        <a href="product.html">
                                            <img class="img-thumbnail" width="80px" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}">
                                        </a>
                                    </td>
                                    @else
                                    @endif
                            @endforeach
                        @else
                        <td class="text-center">
                            <a href="product.html">
                                <img class="img-thumbnail" width="80px" title="کفش راحتی مردانه" alt="کفش راحتی مردانه" src="{{ asset('/storage/products/Sayer/1657529749formal-men-shirt-17.jpg') }}">
                            </a>
                        </td>
                        @endif
                        <td class="text-left"><a href="product.html">{{ $product->title }}</a></td>
                        <td class="text-left">{{ $product->sku }}</td>
                        <td class="text-left">{{ $product->brand->title }}</td>
                        <td class="text-left"><div class="input-group btn-block quantity">
                            <p><b>{{ $product->pivot->Tedad }} ✅</b></p>
                            <span class="input-group-btn">
                            <a href="{{ route('PlusProduct',[$product->id,auth()->user()->id]) }}" data-toggle="tooltip" title="زیاد" class="btn btn-success"><i class="fa fa-plus"></i></a>
                            <a href="{{ route('MinusProduct',[$product->id,auth()->user()->id]) }}" data-toggle="tooltip" title="کم" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></a>
                            </span></div></td>
                            @if ($product->discount_price)
                              <td class="text-right"><p class="price"><span class="price-new">{{ $product->discount_price }} تومان</span> <span class="price-old">{{ $product->price }} تومان</span></p></td>
                           @else
                              <td class="text-right"><p class="price"> {{ $product->price }}</p></td>
                           @endif
                        <td class="text-right">{{ $product->pivot->TotalPrice-$product->pivot->TotalTakhfif }} تومان</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
          <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
          <div class="row">
            <div class="col-sm-8">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                </div>
                <div id="collapse-coupon" class="panel-collapse collapse in">
                    <form action="{{ route('coupon_add') }}" class="form-group" method="POST">
                        @csrf
                        <div class="panel-body">
                            <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                            <div class="input-group">
                              <input type="text" name="code" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control" />
                              <span class="input-group-btn">
                              <input type="submit" value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..."  class="btn btn-primary" />
                              </span></div>
                          </div>
                    </form>

                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">پیش بینی هزینه ی حمل و نقل و مالیات</h4>
                </div>
                <div id="collapse-shipping" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>مقصد خود را جهت براورد هزینه ی 0 تومان وارد کنید.</p>
                    <form class="form-horizontal">
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country">کشور</label>
                        <div class="col-sm-10">
                        <select name="country_id" id="input-country" class="form-control">
                            <option value=""> --- لطفا انتخاب کنید --- </option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-zone">شهر / استان</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="input-zone" name="zone_id">
                            <option value=""> --- لطفا انتخاب کنید --- </option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-postcode">کد پستی</label>
                        <div class="col-sm-10">
                        <input type="text" name="postcode" value="" placeholder="کد پستی" id="input-postcode" class="form-control" />
                        </div>
                    </div>
                    <input type="button" value="دریافت پیش فاکتور" id="button-quote" data-loading-text="بارگذاری ..." class="btn btn-primary" />
                    </form>
                </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                  @if ($KolePoll > auth()->user()->cart->AboveOf)
                    <tr>
                        <td class="text-right"><strong>جمع کل:</strong></td>
                        <td class="text-right">{{ $KolePoll }} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>کسر تخفیف:</strong></td>
                        <td class="text-right">{{$KolePoll-$KolPardakht  }} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>کد تخفیف:{{ auth()->user()->cart->code_coupon }}</strong></td>
                        <td class="text-right">{{ auth()->user()->cart->price_coupon}} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>قابل پرداخت :</strong></td>
                        <td class="text-right">{{$KolPardakht-auth()->user()->cart->price_coupon }} تومان</td>
                    </tr>
                  @else
                    <div class="alert alert-info">مقدار خرید شما باید بیش از {{ auth()->user()->cart->AboveOf }}باشد تا کد تخفیف فعال گردد</div>
                    <tr>
                        <td class="text-right"><strong>جمع کل:</strong></td>
                        <td class="text-right">{{ $KolePoll }} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>کسر تخفیف:</strong></td>
                        <td class="text-right">{{$KolePoll-$KolPardakht  }} تومان</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>قابل پرداخت :</strong></td>
                        <td class="text-right">{{$KolPardakht}} تومان</td>
                    </tr>
                  @endif

              </table>
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="{{ route('payment_veify',$KolPardakht) }}" class="btn btn-primary">تسویه حساب</a></div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
@endsection
