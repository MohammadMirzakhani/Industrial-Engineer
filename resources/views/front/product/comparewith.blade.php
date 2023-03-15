@extends('front.layout.master')
@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="compare.html">مقایسه محصولات</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">مقایسه محصولات</h1>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td colspan="4"><strong>جزئیات محصول</strong></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>محصولات</td>
                  <td><a href="product.html"><strong>{{ $product1->title }}</strong></a></td>
                  <td><a href="product.html"><strong>{{ $product2->title }}</strong></a></td>
                </tr>
                <tr>
                <td>تصویر</td>
                @if (count($product1->photos)>0)
                    @foreach ($product1->photos as $photo)
                        @if ($photo->pivot->IsAsli==1)
                        <td class="text-center"><img class="img-thumbnail" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}"></td>
                        @else
                        @endif
                    @endforeach
                @else
                @endif
                @if (count($product2->photos)>0)
                    @foreach ($product2->photos as $photo)
                        @if ($photo->pivot->IsAsli==1)
                        <td class="text-center"><img class="img-thumbnail" title="لپ تاپ ایلین ور" alt="لپ تاپ ایلین ور" src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}"></td>
                        @else
                        @endif
                    @endforeach
                @else
                @endif
                </tr>
                <tr>
                  <td>قیمت</td>
                  <td> <span class="price-new">{{ $product1->price }}  تومان</span></td>
                  <td> <span class="price-new">{{ $product2->price }}  تومان</span></td>
                </tr>
                <tr>
                  <td>برند</td>
                  <td>{{ $product1->brand->title }}</td>
                  <td>{{ $product2->brand->title }}</td>
                </tr>
                <tr>
                  <td>خلاصه</td>
                  <td class="description">{!!$product1->description !!}</td>
                  <td class="description">{!!$product2->description!!}</td>
                </tr>
                <tr>
                  <td>وزن</td>
                  <td>1.50kg</td>
                  <td>1.80kg</td>
                </tr>
                <tr>
                  <td>ابعاد (طول - عرض - ارتفاع)</td>
                  <td>0.00mm x 0.00mm x 0.00mm</td>
                  <td>0.00mm x 0.00mm x 0.00mm</td>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <td>عملیات</td>
                  <td><input type="button" onClick="" class="btn btn-primary btn-block" value="افزودن به سبد">
                    <a class="btn btn-danger btn-block" href="#">حذف</a></td>
                  <td><input type="button" onClick="" class="btn btn-primary btn-block" value="افزودن به سبد">
                    <a class="btn btn-danger btn-block" href="#">حذف</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
        </div>
        <!--Middle Part End -->
        <div id="content" class="col-sm-6">
            <h2 class="title"><b> دیگر ویژگی های محصول <div class="btn btn-warning">{{ $product1->title }}</div></b></h2>
            <table class="table table-borderless table-dark">
                <tbody>
                    @foreach ($product1->attributevalues as $attribute)
                        <tr>
                        <td>{{ $attribute->attributegroup->title }}</td>
                        <td>{{ $attribute->title }}</td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div id="content" class="col-sm-6">
            <h2 class="title"><b> دیگر ویژگی های محصول <div class="btn btn-warning">{{ $product2->title }}</div></b></h2>
            <table class="table table-borderless table-dark">
                <tbody>
                    @foreach ($product2->attributevalues as $attribute)
                        <tr>
                        <td>{{ $attribute->attributegroup->title }}</td>
                        <td>{{ $attribute->title }}</td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection
