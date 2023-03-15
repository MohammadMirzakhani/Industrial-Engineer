@extends('front.layout.master')
@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">{{ $category->name }}</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">دسته ها</h3>
          <div class="box-category">
            <ul id="cat_accordion">
              <li><a href="category.html">مد و زیبایی</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">آقایان</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">بانوان</a></li>
                  <li><a href="category.html">دخترانه</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">پسرانه</a></li>
                  <li><a href="category.html">نوزاد</a></li>
                  <li><a href="category.html">لوازم</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a class="active" href="category.html">الکترونیکی</a> <span class="down"></span>
                <ul style="display:block;">
                  <li><a href="category.html">لپ تاپ</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">رومیزی</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">دوربین</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">موبایل و تبلت</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">صوتی و تصویری</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">لوازم خانگی</a></li>
                </ul>
              </li>
              <li><a href="category.html">کفش</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">آقایان</a></li>
                  <li><a href="category.html">بانوان</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">دخترانه</a></li>
                  <li><a href="category.html">پسرانه</a></li>
                  <li><a href="category.html">نوزاد</a></li>
                  <li><a href="category.html">لوازم</a><span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="category.html">ساعت</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">ساعت مردانه</a></li>
                  <li><a href="category.html">ساعت زنانه</a></li>
                  <li><a href="category.html">ساعت بچگانه</a></li>
                  <li><a href="category.html">لوازم</a></li>
                </ul>
              </li>
              <li><a href="category.html">زیبایی و سلامت</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">عطر و ادکلن</a></li>
                  <li><a href="category.html">آرایشی</a></li>
                  <li><a href="category.html">ضد آفتاب</a></li>
                  <li><a href="category.html">مراقبت از پوست</a></li>
                  <li><a href="category.html">مراقبت از چشم</a></li>
                  <li><a href="category.html">مراقبت از مو</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <h3 class="subtitle">پرفروش ها</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/iphone_1-50x75.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">آیفون 7</a></h4>
                <p class="price"> 2200000 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/macbook_1-50x75.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                <p class="price"> 900000 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/sony_vaio_1-50x75.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                <p class="price">122000 تومان</p>
              </div>
            </div>
          </div>
          <h3 class="subtitle">ویژه</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/macbook_pro_1-50x75.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/samsung_tab_1-50x75.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">تبلت ایسر</a></h4>
                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی شرت کتان مردانه</a></h4>
                <p class="price"> <span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/nikon_d300_1-50x75.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/nikon_d300_5-50x75.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="/front/image/product/macbook_air_1-50x75.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
              </div>
            </div>
          </div>
          <div class="banner owl-carousel">
            <div class="item"> <a href="#"><img src="/front/image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div>
            <div class="item"> <a href="#"><img src="/front/image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div>
          </div>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">دیجیتال</h1>

          <h3 class="subtitle">بهبود جستجو</h3>
          <div class="category-list row">
                        <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">صوتی و تصویری (3)</a></li>
                        <li><a href="category.html">لوازم خانگی (2)</a></li>
                      </ul>
        </div>
                <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">موبایل و تبلت (2)</a></li>
                        <li><a href="category.html">لپ تاپ (3)</a></li>
                      </ul>
        </div>
                <div class="col-sm-3">
          <ul class="list-item">
                        <li><a href="category.html">رومیزی (0)</a></li>
                        <li><a href="category.html">دوربین (0)</a></li>
                      </ul>
        </div>
                      </div>

          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                  <option value="" selected="selected">پیشفرض</option>
                  <option value="">نام (الف - ی)</option>
                  <option value="">نام (ی - الف)</option>
                  <option value="">قیمت (کم به زیاد)</option></option>
                  <option value="">قیمت (زیاد به کم)</option>
                  <option value="">امتیاز (بیشترین)</option>
                  <option value="">امتیاز (کمترین)</option>
                  <option value="">مدل (A - Z)</option>
                  <option value="">مدل (Z - A)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">نمایش :</label>
              </div>
              <div class="col-sm-2 text-right">
                  <a href="{{ route('category_products',[$category->id,3]) }}">3_</a>
                  <a href="{{ route('category_products',[$category->id,5]) }}">5_</a>
                  <a href="{{ route('category_products',[$category->id,10]) }}">10_</a>
                  <a href="{{ route('category_products',[$category->id,15]) }}">15</a>
              </div>
            </div>
          </div>
          <br />
          <div class="row products-category">
            @foreach ($products as $product)
            <div class="product-layout product-list col-xs-12">
            <div class="product-thumb clearfix">
                @if (count($product->photos)>0)
                    @foreach ($product->photos as $photo)
                        @if ($photo->pivot->IsAsli==1)
                            <div class="image"><a href="{{ route('ShowProduct',$product->id) }}"><img src="{{ asset('/storage/products/Asli/'.$photo->path.'') }}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"  /></a></div>
                        @else
                        @endif
                    @endforeach
                @else
                    <div class="image"><a href="{{ route('ShowProduct',$product->id) }}"><img src="{{ asset('/storage/products/Sayer/1657529749formal-men-shirt-17.jpg') }}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"  /></a></div>
                @endif

                <div class="caption">
                  <h4><a href="{{ route('ShowProduct',$product->id) }}">{{ $product->title }}</a></h4>
                  @if ($product->discount_price)
                    <p class="price"><span class="price-new">{{ $product->discount_price }} تومان</span> <span class="price-old">{{ $product->price }} تومان</span><span class="saving">{{ abs(round(($product->discount_price-$product->price)/$product->price*100)) }}%</span></p>
                  @else
                    <p class="price"> {{ $product->price }}</p>
                  @endif
                </div>
                <div class="button-group">
                  @auth()
                    <a href="{{ route('AddProductToCart',[$product->id,auth()->user()->id]) }}"><span>افزودن به سبد</span></a>
                  @else
                    <span>افزودن به سبد</span>
                  @endauth
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach




        </div>
        <!--Middle Part End -->
        <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
            {{ $products->links() }}

            </ul>
            </div>
      </div>
    </div>
  </div>
@endsection
