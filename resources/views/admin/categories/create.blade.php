@extends('admin.layout.master')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="{{ route('Asli') }}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">دسته بندی ها</a></li>
        <li class="breadcrumb-item action">دسته بندی جدید</li>
    </ol>
@endsection
@section('body')
<section class="content">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">ایجاد دسته بندی جدید</h3>

        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">

        </ul>
        </div>
        </div>

        <div class="card-body">
         <div class="row">
             <div class="col-md-6 col-md-offset-3">

                     <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" name="name" placeholder="عنوان دسته بندی" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>دسته والد</label>
                            <select class="form-control selectpicker" data-live-search="true" name="category_parent" >
                                    <option value="">بدون والد</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name }}</option>
                                        @if (count($category->children)>0)
                                           @include('admin.partial.create-category',['categories'=>$category->children,'level'=>1])
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">عنوان سئو </label>
                            <input type="text" name="meta_title" placeholder="عنوان سئو را وارد کنید ..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">کلمات کلیدی سئو</label>
                            <input type="text" name="meta_keyword" placeholder="کلمات کلیدی سئو را وارد کنید ..." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">توضیحات سئو</label>
                            <textarea type="text" name="meta_description" placeholder="توضیحات سئو را وارد کنید ..."  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="submit" value="ذخیره" class="btn btn bg-success">
                        </div>
                    </form>
             </div>
         </div>
        </div>
        </div>
</section>

@endsection

