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
        <h3 class="card-title">ویرایش دسته بندی {{ $category->name }}</h3>

        <div class="card-tools">
        <ul class="pagination pagination-sm float-right">

        </ul>
        </div>
        </div>

        <div class="card-body">
         <div class="row">
             <div class="col-md-6 col-md-offset-3">

                     <form action="{{ route('category.update',$category->id) }}" method="post">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" name="name" placeholder="عنوان دسته بندی" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label>دسته والد</label>
                            <select class="form-control" name="category_parent" >
                                    <option value="">بدون والد</option>
                                    @foreach ($categories as $category_data)
                                    <option value="{{ $category_data->id }}" @if ($category->parent_id==$category_data->id) selected @endif>{{$category_data->name }}</option>
                                        @if (count($category_data->children)>0)
                                           @include('admin.partial.create-category',['categories'=>$category_data->children,'level'=>1,'selected_category'=>$category])
                                        @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">عنوان سئو </label>
                            <input type="text" name="meta_title" placeholder="عنوان سئو را وارد کنید ..." class="form-control" value="{{ $category->meta_title }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">کلمات کلیدی سئو</label>
                            <input type="text" name="meta_keyword" placeholder="کلمات کلیدی سئو را وارد کنید ..." class="form-control" value="{{ $category->meta_keyword }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">توضیحات سئو</label>
                            <textarea type="text" name="meta_description" placeholder="توضیحات سئو را وارد کنید ..."  class="form-control">{{ $category->meta_description }}</textarea>
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

