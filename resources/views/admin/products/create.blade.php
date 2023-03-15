@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">محصولات </a></li>
        <li class="breadcrumb-item action">محصول جدید</li>
    </ol>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('body')
    <section class="content" id="app">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ایجاد محصول جدید</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                </ul>
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" name="title" placeholder="نام محصول" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">نام مستعار</label>
                                    <input type="text" name="slug" placeholder="نام مستعار محصول" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title">وضعیت محصول</label><br>
                                <div >
                                    <input type="radio" name="status" class="btn-check" id="html"  value="0" checked>
                                    <label for="html" class="btn btn-outline-danger">منتشر نشده</label>
                                    <input type="radio" name="status" class="btn-check"  id="javascript"  value="1">
                                    <label for="javascript" class="btn btn-outline-success">منتشر شده</label>
                                </div>
                                <div class="form-group">
                                <label >دسته بندی</label>
                                    <select class="form-control" name="categories[]" multiple>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name }}</option>
                                            @if (count($category->children)>0)
                                                @include('admin.partial.create-category',['categories'=>$category->children,'level'=>1])
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                <label >برند ها </label>
                                  <select class="form-control" name="brand_id" >
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{$brand->title }}</option>
                                    @endforeach
                                </select>
                               </div>
                               <div class="form-group">
                                   <label >قیمت</label>
                                   <input type="number" name="price" placeholder="قیمت محصول" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label >قیمت ویژه</label>
                                   <input type="number" name="discount_price" placeholder="قیمت ویژه محصول" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label >توضیحات </label>
                                   <textarea id="ckeditor" type="text" name="description" placeholder="توضیحات را وارد کنید ..."  class="ckeditor form-control"></textarea>
                               </div>
                               <input type="hidden" name="photo_id" id="brand-photo">
                               <div class="form-group">
                                   <label >تصویر اصلی محصول</label>
                                   <input type="file" name="AsliImageProduct"  class="form-control form-control-lg" >
                               </div>
                               <div class="form-group">
                                <label >سایر تصاویر محصول</label>
                                <input type="file" name="SayerImageProduct[]"  class="form-control form-control-lg" multiple>
                               </div>
                               <div class="form-group">
                                   <label >عنوان سئو </label>
                                   <input type="text" name="meta_title" placeholder="عنوان سئو را وارد کنید ..." class="form-control">
                               </div>
                               <div class="form-group">
                                   <label >کلمات کلیدی سئو</label>
                                   <input type="text" name="meta_keyword" placeholder="کلمات کلیدی سئو را وارد کنید ..." class="form-control">
                               </div>
                               <div class="form-group">
                                   <label>توضیحات سئو</label>
                                   <textarea type="text" name="meta_description" placeholder="توضیحات سئو را وارد کنید ..."  class="form-control"></textarea>
                               </div>
                               <div class="form-group">
                                   <label></label>
                                   <input type="submit" value="ذخیره" class="btn btn bg-success">
                               </div>
            </div>
    </section>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#ckeditor' ),{
        language :'fa'
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection

